const getTweets = async function(tweetIDS) {

  if (!process.env.BEARER_TOKEN) {
    return res.status(401).json({
      errors: [{ message: 'A Twitter API token is required to execute this request' }],
    });
  }

  const response = await fetch(
    `https://api.twitter.com/2/tweets?ids=${tweetIDS}&tweet.fields=created_at&expansions=author_id&user.fields=created_at`,
    {
      headers: {
        authorization: `Bearer ${process.env.BEARER_TOKEN}`,
      },
    }
  );

  const tweets;
  if (response.ok) {
    const { statuses } = await response.json();
    tweets = statuses.map(tweet => tweet.id_str);
    // Cache the Twitter response for 3 seconds, to avoid hitting the Twitter API limits
    // of 450 requests every 15 minutes (with app auth)
    // res.setHeader('Cache-Control', 's-maxage=3, stale-while-revalidate');
    // res.status(200).json({ tweets: statuses.map(tweet => tweet.id_str) });
  } else {
      tweets = `Failed to the Twitter API failed with code: ${response.status}`;
    // res.status(400).json({
    //   errors: [{ message: `Fetch to the Twitter API failed with code: ${response.status}` }],
    // });
  }

  console.log(tweets);
}