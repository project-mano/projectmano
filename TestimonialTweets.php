<?php
require_once('vendor/autoload.php');
require_once('TwitterAPIExchange.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$settings = array(
  'oauth_access_token'        => $_ENV['accesstoken'],
  'oauth_access_token_secret' => $_ENV['accesstokensecret'],
  'consumer_key'              => $_ENV['apikey'],
  'consumer_secret'           => $_ENV['apisecretkey']
);
$url1 = 'https://api.twitter.com/2/tweets';
$url2 = 'https://api.twitter.com/2/users/by/username/projectmano';
$requestMethod = 'GET';
$tweetIDS = "1414940103319883777,1404905853111746562,1418956281105289218";
$getfield1 = "?ids=$tweetIDS&tweet.fields=created_at,public_metrics,entities&expansions=author_id&user.fields=created_at,profile_image_url,verified";
$getfield2 = "?user.fields=profile_image_url";

$twitter = new TwitterAPIExchange($settings);
$tweets =  $twitter->setGetfield($getfield1)
                  ->buildOauth($url1, $requestMethod)
                  ->performRequest();
$mano =  $twitter->setGetfield($getfield2)
                  ->buildOauth($url2, $requestMethod)
                  ->performRequest();

$tweets = json_decode($tweets);
$mano = json_decode($mano)->data;

$data = $tweets->data;
$includes = $tweets->includes;
$users = $includes->users;

if($users && $data)
{
    $counter = 0;
    $tweetsList = "";
    foreach($users as $user)
    {
        $uname = $user->username;
        $name = $user->name;
        $public_metrics = $data[$counter]->public_metrics;
        $entities = $data[$counter]->entities;
        $urls = $entities && $entities->urls ? $entities->urls : null;
        
        $isVerified = $user->verified;
        $avatar = $user->profile_image_url;
        $tweet = $data[$counter]->text;
        $tweetID = $data[$counter]->id;
        $tweetedAt = (date("h", strtotime($data[$counter]->created_at)) + 1) . date(":i A · M d, Y" , strtotime($data[$counter]->created_at));

        $url = $urls[0] ? $urls[0]->url : null;
        $tweetBody = "";
        if ($counter === 0) {
          $mentionedUser = $entities->mentions && $entities->mentions[0] ? $entities->mentions[0]->username : '';
          $tweetBody .= "Renewed hope: how bitcoin and green energy can save Ethiopia’s economy. By: <a href='https://twitter.com/$mentionedUser}' class='text-blue-600 hover:underline' target='__blank'>@$mentionedUser</a>
                            <a href='$url' target='__blank'>
                            <div class='subTweet flex flex-col rounded-xl border border-gray-300 hover:bg-gray-200 mt-2 text-sm'>
                                <div class='forbesCover'></div>
                                <div class='flex flex-col p-2'>
                                <span class='font-bold'>Renewed Hope: How Bitcoin And Green Energy Can Save Ethiopia’s Economy</span>
                                <span class='flex items-center text-gray-600'>
                                    <svg viewBox='0 0 24 24' aria-hidden='true' class='w-4 h-4 fill-current text-gray-500 mr-1'><g><path d='M11.96 14.945c-.067 0-.136-.01-.203-.027-1.13-.318-2.097-.986-2.795-1.932-.832-1.125-1.176-2.508-.968-3.893s.942-2.605 2.068-3.438l3.53-2.608c2.322-1.716 5.61-1.224 7.33 1.1.83 1.127 1.175 2.51.967 3.895s-.943 2.605-2.07 3.438l-1.48 1.094c-.333.246-.804.175-1.05-.158-.246-.334-.176-.804.158-1.05l1.48-1.095c.803-.592 1.327-1.463 1.476-2.45.148-.988-.098-1.975-.69-2.778-1.225-1.656-3.572-2.01-5.23-.784l-3.53 2.608c-.802.593-1.326 1.464-1.475 2.45-.15.99.097 1.975.69 2.778.498.675 1.187 1.15 1.992 1.377.4.114.633.528.52.928-.092.33-.394.547-.722.547z'></path><path d='M7.27 22.054c-1.61 0-3.197-.735-4.225-2.125-.832-1.127-1.176-2.51-.968-3.894s.943-2.605 2.07-3.438l1.478-1.094c.334-.245.805-.175 1.05.158s.177.804-.157 1.05l-1.48 1.095c-.803.593-1.326 1.464-1.475 2.45-.148.99.097 1.975.69 2.778 1.225 1.657 3.57 2.01 5.23.785l3.528-2.608c1.658-1.225 2.01-3.57.785-5.23-.498-.674-1.187-1.15-1.992-1.376-.4-.113-.633-.527-.52-.927.112-.4.528-.63.926-.522 1.13.318 2.096.986 2.794 1.932 1.717 2.324 1.224 5.612-1.1 7.33l-3.53 2.608c-.933.693-2.023 1.026-3.105 1.026z'></path></g></svg>
                                    <span>forbes.com</span>
                                </span>
                                </div>
                            </div>
                            </a>";
        } else if ($counter === 1) {
          
          $tweetBody .= "🇪🇹<a href='https://twitter.com/hashtag/bitcoin' target='__blank' class='text-blue-600 hover:underline'>#bitcoin</a>
                            <a href='$url' target='__blank'>
                                <div class='subTweet flex flex-col mt-1 lg:mt-2 rounded-lg p-3 border border-gray-300 hover:bg-gray-200 text-sm'>
                                <div class='flex space-x-1'>
                                    <span class='flex items-center justify-center space-x-1 mr-1'>
                                    <img alt='Mano' draggable='false' src='$mano->profile_image_url' class='w-5 h-5 rounded-full'>
                                    <b>$mano->name</b></span>
                                    <span>@$mano->username</span>
                                </div>
                                <div class='mt-1'>
                                    THREAD - For the last 6 months or so, we have been trying to push the Ethiopian Gov. to consider mining and storing #Bitcoin to combat the rising inequalities & global inflation. We now have mobilized like-minded Ethiopians to start Project Mano 
                                    projectmano.com <br><br>
                                    1/4
                                </div>
                                </div>
                            </a>";
        } else {
          $manoUsername = $entities->mentions && $entities->mentions[1] ? $entities->mentions[1]->username : '';
          $tweetBody .= "Seven months ago, a group of activists started <a href='$url' class='text-blue-600 hover:underline' target='__blank'>projectmano.com</a>. The project is open-source.
          <br><br>Their goal is to educate the <a href='https://twitter.com/hashtag/Eth' target='__blank' class='text-blue-600 hover:underline'>#Eth</a> government to adopt <a href='https://twitter.com/hashtag/bitcoin' target='__blank' class='text-blue-600 hover:underline'>#Bitcoin</a>
          <br><br>------> <a href='https://twitter.com/$manoUsername' class='text-blue-600 hover:underline'>@projectmano</a>";
        }

        $aosDelay = ($counter+1) . 00;
        $tweetsList .= "
                <div data-aos='fade-left' data-aos-delay='$aosDelay' class='rounded-lg bg-gray-100 border border-gray-300 px-2 lg:px-4 py-2 lg:py-4 max-h-auto min-w-50'>
                <div class='flex items-center'>
                <a class='flex h-8 lg:h-12 w-8 lg:w-12 mr-3' href='https://twitter.com/$uname' target='_blank'>
                    <img alt='$uname' src='$avatar' class='rounded-full w-full' />
                </a>
                <a href='https://twitter.com/$uname' class='flex flex-col items-start justify-start' target='_blank' class='flex flex-col ml-4'>
                    <span class='flex items-center font-bold text-gray-900 lg:leading-5 text-sm lg:text-lg' title='$name'>
                    $name";

        $tweetsList .= $isVerified ? "
                        <svg aria-label='Verified Account' class='ml-1 text-blue-500 inline h-4 w-4' viewBox='0 0 24 24'>
                        <g fill='currentColor'>
                        <path d='M22.5 12.5c0-1.58-.875-2.95-2.148-3.6.154-.435.238-.905.238-1.4 0-2.21-1.71-3.998-3.818-3.998-.47 0-.92.084-1.336.25C14.818 2.415 13.51 1.5 12 1.5s-2.816.917-3.437 2.25c-.415-.165-.866-.25-1.336-.25-2.11 0-3.818 1.79-3.818 4 0 .494.083.964.237 1.4-1.272.65-2.147 2.018-2.147 3.6 0 1.495.782 2.798 1.942 3.486-.02.17-.032.34-.032.514 0 2.21 1.708 4 3.818 4 .47 0 .92-.086 1.335-.25.62 1.334 1.926 2.25 3.437 2.25 1.512 0 2.818-.916 3.437-2.25.415.163.865.248 1.336.248 2.11 0 3.818-1.79 3.818-4 0-.174-.012-.344-.033-.513 1.158-.687 1.943-1.99 1.943-3.484zm-6.616-3.334l-4.334 6.5c-.145.217-.382.334-.625.334-.143 0-.288-.04-.416-.126l-.115-.094-2.415-2.415c-.293-.293-.293-.768 0-1.06s.768-.294 1.06 0l1.77 1.767 3.825-5.74c.23-.345.696-.436 1.04-.207.346.23.44.696.21 1.04z' />
                        </g>
                    </svg>" : '';

        $tweetsList .= "</span>
                        <span class='text-gray-500 text-sm lg:text-lg' title='@$uname'> @$uname </span>
                    </a>
                    <a class='ml-auto mr-2 lg:mr-0' href='https://twitter.com/$uname' target='_blank' rel='noopener noreferrer'>
                        <svg viewBox='328 355 335 276' height='24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M 630, 425 A 195, 195 0 0 1 331, 600 A 142, 142 0 0 0 428, 570 A 70, 70 0 0 1 370, 523 A 70, 70 0 0 0 401, 521 A 70, 70 0 0 1 344, 455 A 70, 70 0 0 0 372, 460 A 70, 70 0 0 1 354, 370 A 195, 195 0 0 0 495, 442 A 67, 67 0 0 1 611, 380 A 117, 117 0 0 0 654, 363 A 65, 65 0 0 1 623, 401 A 117, 117 0 0 0 662, 390 A 65, 65 0 0 1 630, 425 Z' fill='#3BA9EE' /></svg>
                    </a>
                    </div>
                    <div id='tweetBody' class='py-1 lg:py-2 lg:leading-normal whitespace-pre-wrap_ text-sm lg:text-lg text-gray-700'>$tweetBody</div>
                    <a class='text-gray-500 text-sm hover:underline' href='https://twitter.com/$uname/status/$tweetID' target='_blank' rel='noopener noreferrer'> $tweetedAt </a>
                    <div class='flex text-gray-700 lg:mt-2 justify-between_ items-center'>
                      
                      <a class='flex items-center mr-4 text-gray-500 hover:text-blue-600 transition hover:underline mr-8' href='https://twitter.com/intent/tweet?in_reply_to=$tweetID' target='_blank' rel='noopener noreferrer'>
                          <svg class='mr-2' width='20' height='20' viewBox='0 0 24 24'>
                          <path class='fill-current' d='M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.045.286.12.403.143.225.385.347.633.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.368-3.43-7.788-7.8-7.79zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.334-.75-.75-.75h-.395c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z' />
                          </svg>
                          <span>$public_metrics->reply_count</span>
                      </a>
                      <a class='flex items-center mr-4 text-gray-500 hover:text-green-600 transition hover:underline' href='https://twitter.com/intent/retweet?tweet_id=$tweetID' target='_blank' rel='noopener noreferrer'>
                          <svg class='mr-2' width='20' height='20' viewBox='0 0 24 24'>
                          <path class='fill-current' d='M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z' />
                          </svg>
                          <span>$public_metrics->retweet_count</span>
                      </a>
                      <a class='flex items-center text-gray-500 hover:text-red-600 transition hover:underline mr-8' href='https://twitter.com/intent/like?tweet_id=$tweetID' target='_blank' rel='noopener noreferrer'>
                          <svg class='mr-2' width='20' height='20' viewBox='0 0 24 24'>
                          <path class='fill-current' d='M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.813-1.148 2.353-2.73 4.644-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.375-7.454 13.11-10.037 13.156H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.035 11.596 8.55 11.658 1.52-.062 8.55-5.917 8.55-11.658 0-2.267-1.822-4.255-3.902-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.015-.03-1.426-2.965-3.955-2.965z' />
                          </svg>
                          <span>$public_metrics->like_count</span>
                      </a>

                    </div>
                </div>";
        $counter++;
    }

      $tweetsList .= '
            <div data-aos="fade-left" data-aos-delay="400" class="rounded-lg bg-gray-100 max-h-auto min-w-50">
              <div class="w-full bg-gray-800 px-2 lg:px-8 py-2 rounded-t-lg">
                <a href="https://btcmanager.com/ethiopia-clean-bitcoin-mining-economy" target="_blank">
                  <img src="./assets/imgs/btcmanager.png" class="w-44 lg:w-52 mx-auto"/>
                </a>
              </div>
              <div id="tweetBody" class="lg:mt-3 lg:mb-2 lg:leading-normal whitespace-pre-wrap_ text-sm lg:text-lg text-gray-700 px-4 lg:px-8 py-1">
                <em>Amidst the growing inflation rate and the constantly depleting value of its foreign reserves, due to the US Federal Reserve’s endless dollar printing, Ethiopia may be the next sovereign state to integrate bitcoin (BTC) into its economy, in order to beat impending hyperinflation.</em>
              </div>
              <div class="my-1 lg:my-3">
                <a class="text-gray-500 text-sm hover:underline mx-4 lg:mx-8" href="https://btcmanager.com/ethiopia-clean-bitcoin-mining-economy" target="_blank" rel="noopener noreferrer"> July 14, 2021 </a>
              </div>
            </div>
            ';

      $tweetsList .= '
            <div data-aos="fade-left" data-aos-delay="500" class="rounded-lg bg-gray-100 max-h-auto min-w-50">
              <div class="flex items-center justify-center bg-gray-800 px-2 lg:px-8 py-2 rounded-t-lg">
                <a href="https://cointelegraph.com/news/jack-dorsey-notes-lobbying-efforts-to-get-ethiopian-gov-t-to-embrace-bitcoin" target="_blank">
                    <svg width="268" height="62" class="max-w-lg" style="background: inherit" xmlns="http://www.w3.org/2000/svg">
                        <g fill="#fabf2b"><path d="M38.838 45.114l-11.166 4.799v-.48c-2.153.545-4.538.859-6.797.96-10.501-.101-18.836-5.534-18.933-11.999v-2.4c3.449 4.958 10.47 8.28 18.933 8.16 2.863.12 5.792-.328 8.253-.96l.971-2.4c-2.919.861-6.105 1.46-9.224 1.44-10.501.02-18.836-5.413-18.933-11.998v-1.92c3.449 4.583 10.455 7.906 18.933 7.679 3.814.227 7.544-.566 10.68-1.92l.486-2.4c-3.064 1.598-7.035 2.526-11.166 2.4-10.501.126-18.836-5.307-18.933-11.998v-1.92c3.449 4.69 10.47 8.012 18.933 8.159 4.81-.147 9.37-1.404 13.108-3.36l.486-2.88c-3.393 2.486-8.346 4.088-13.594 4.32C10.374 26.164 2.04 20.73 1.942 13.918 2.039 7.439 10.374 2.006 20.875 1.92c6.26.086 12.074 2.256 15.536 5.759l.337.555 2.448.01-.358-.565C35.395 3.053 28.509 0 20.875 0 9.256 0 0 6.331 0 13.918v24.956c.408 7.406 9.453 13.438 20.875 13.438 7.544 0 14.324-2.933 17.963-7.198z" fill="#FFF"/>
                        <path d="M34.296 62l3.92-16.469-11.269 4.844 6.86-28.578h-13.23l3.43-14.047h42.136l-3.43 14.047H48.995l-2.94 7.75 15.188-6.297L34.296 62zm6.86-19.86l-1.96 9.688L55.364 27.61l-13.229 5.813 5.88-13.563h13.228l2.45-10.172H25.477l-2.45 10.172h13.229l-6.37 27.125 11.27-4.843zm54.015-25.113c-.116 1.606-.709 2.87-1.779 3.794-1.07.923-2.48 1.384-4.23 1.384-1.913 0-3.42-.644-4.516-1.933C83.549 18.984 83 17.215 83 14.966v-.913c0-1.435.253-2.7.759-3.794.506-1.093 1.229-1.933 2.168-2.517.94-.585 2.032-.877 3.277-.877 1.722 0 3.11.462 4.163 1.385 1.052.922 1.66 2.218 1.825 3.886h-3.076c-.075-.964-.344-1.663-.805-2.097-.462-.434-1.164-.651-2.107-.651-1.026 0-1.793.367-2.302 1.102-.51.735-.771 1.875-.785 3.42v1.128c0 1.613.245 2.792.733 3.537.49.745 1.26 1.118 2.313 1.118.95 0 1.659-.217 2.127-.651.469-.434.737-1.106.805-2.015h3.076zm15.884-2.153c0 1.47-.26 2.758-.78 3.865-.519 1.108-1.262 1.962-2.23 2.564-.967.601-2.076.902-3.327.902-1.237 0-2.341-.297-3.312-.892-.97-.595-1.723-1.444-2.256-2.548-.533-1.104-.803-2.374-.81-3.81v-.738c0-1.47.265-2.763.795-3.88.53-1.118 1.278-1.976 2.246-2.575.967-.598 2.073-.897 3.317-.897 1.244 0 2.35.3 3.317.897.967.599 1.716 1.457 2.245 2.574.53 1.118.795 2.408.795 3.871v.667zm-3.117-.677c0-1.566-.28-2.755-.84-3.569-.561-.813-1.361-1.22-2.4-1.22-1.033 0-1.829.402-2.39 1.205-.56.803-.844 1.98-.85 3.533v.728c0 1.524.28 2.707.84 3.547.56.841 1.367 1.262 2.42 1.262 1.032 0 1.825-.405 2.38-1.215.553-.81.833-1.991.84-3.543v-.728zM118.16 22h-3.076V7.07h3.076V22zm16.592 0h-3.077l-5.988-9.823V22h-3.076V7.07h3.076l5.999 9.844V7.07h3.066V22zM149.98 9.562h-4.573V22h-3.076V9.562h-4.512V7.07h12.161v2.492zm12.336 5.968h-5.906v3.999h6.931V22h-10.008V7.07h9.988v2.492h-6.911v3.558h5.906v2.41zm7.506 3.999h6.532V22h-9.608V7.07h3.076v12.46zm18.878-4h-5.906v4h6.931V22h-10.007V7.07h9.987v2.492h-6.911v3.558h5.906v2.41zm16.243 4.584c-.554.663-1.337 1.178-2.349 1.543-1.011.366-2.132.55-3.363.55-1.292 0-2.425-.283-3.399-.847-.974-.564-1.726-1.382-2.256-2.456-.53-1.073-.801-2.334-.815-3.783v-1.016c0-1.49.251-2.78.754-3.87.502-1.09 1.227-1.925 2.173-2.502.947-.578 2.056-.867 3.328-.867 1.77 0 3.155.422 4.153 1.267.998.844 1.589 2.073 1.774 3.686h-2.995c-.136-.855-.439-1.48-.907-1.877-.468-.396-1.113-.594-1.933-.594-1.046 0-1.842.393-2.39 1.179-.546.786-.823 1.955-.83 3.507v.953c0 1.566.298 2.748.892 3.548.595.8 1.467 1.2 2.615 1.2 1.155 0 1.98-.246 2.471-.738v-2.574h-2.799v-2.266h5.876v5.957zm9.618-3.578h-2.45V22h-3.077V7.07h5.548c1.763 0 3.124.393 4.08 1.18.958.786 1.436 1.896 1.436 3.332 0 1.019-.22 1.868-.661 2.548-.441.68-1.11 1.222-2.005 1.625l3.23 6.101V22h-3.302l-2.799-5.465zm-2.45-2.492h2.48c.773 0 1.371-.197 1.795-.59.424-.393.636-.934.636-1.625 0-.704-.2-1.258-.6-1.661-.4-.403-1.013-.605-1.84-.605h-2.472v4.481zm20.354 4.88h-5.394L226.046 22h-3.271l5.558-14.93h2.85L236.771 22h-3.27l-1.036-3.076zm-4.563-2.49h3.732l-1.876-5.59-1.856 5.59zm14.94.307V22h-3.076V7.07h5.824c1.121 0 2.107.205 2.958.616.852.41 1.506.992 1.964 1.748.458.755.687 1.615.687 2.579 0 1.463-.5 2.616-1.502 3.46-1.002.845-2.388 1.267-4.158 1.267h-2.697zm0-2.492h2.748c.814 0 1.434-.191 1.861-.574.428-.383.641-.93.641-1.64 0-.732-.215-1.324-.646-1.775-.43-.45-1.025-.683-1.784-.697h-2.82v4.686zM267.062 22h-3.076v-6.398h-5.998V22h-3.077V7.07h3.077v6.05h5.998V7.07h3.076V22z" fill="#FABF2C"/>
                        <path d="M91.46 35.83h-3.326V45h-1.838v-9.17H83v-1.494h8.46v1.494zm3.58 2.11c.581-.674 1.316-1.011 2.205-1.011 1.69 0 2.546.964 2.57 2.893V45h-1.779v-5.112c0-.547-.118-.934-.355-1.161-.237-.227-.585-.34-1.044-.34-.713 0-1.245.317-1.597.951V45h-1.78V33.75h1.78v4.19zm10.664 7.206c-1.128 0-2.042-.355-2.743-1.065-.7-.71-1.051-1.657-1.051-2.838v-.22c0-.791.153-1.498.458-2.12a3.484 3.484 0 011.285-1.454 3.398 3.398 0 011.846-.52c1.079 0 1.913.344 2.501 1.032.588.689.883 1.663.883 2.923v.718h-5.179c.054.654.273 1.171.656 1.552s.865.572 1.446.572c.816 0 1.48-.33 1.993-.99l.96.916a3.204 3.204 0 01-1.272 1.103c-.53.26-1.124.391-1.783.391zm-.212-6.79c-.489 0-.883.172-1.183.514-.3.341-.492.817-.575 1.428h3.39v-.132c-.038-.596-.197-1.046-.475-1.351-.279-.305-.664-.458-1.157-.458zM115.825 45v-6.606h-1.209v-1.319h1.209v-.725c0-.879.244-1.558.732-2.036.489-.479 1.172-.718 2.051-.718.313 0 .645.044.996.132l-.044 1.392a3.505 3.505 0 00-.681-.059c-.85 0-1.274.437-1.274 1.311v.703h1.61v1.319h-1.61V45h-1.78zm10.092-.776c-.522.615-1.265.922-2.227.922-.859 0-1.51-.251-1.951-.754-.442-.503-.663-1.23-.663-2.183v-5.134h1.78v5.112c0 1.006.417 1.51 1.252 1.51.864 0 1.448-.31 1.75-.93v-5.692h1.78V45h-1.677l-.044-.776zm6.364-9.075v1.926h1.4v1.319h-1.4v4.423c0 .303.06.522.18.656s.333.201.64.201c.206 0 .413-.024.623-.073v1.377a4.383 4.383 0 01-1.172.168c-1.367 0-2.05-.754-2.05-2.263v-4.49h-1.304v-1.318h1.303V35.15h1.78zm8.159 9.075c-.523.615-1.265.922-2.227.922-.86 0-1.51-.251-1.952-.754-.442-.503-.663-1.23-.663-2.183v-5.134h1.78v5.112c0 1.006.418 1.51 1.253 1.51.864 0 1.447-.31 1.75-.93v-5.692h1.78V45h-1.677l-.044-.776zm8.283-5.523a4.404 4.404 0 00-.725-.058c-.816 0-1.365.312-1.648.937V45h-1.78v-7.925h1.7l.043.886c.43-.688 1.026-1.032 1.787-1.032.254 0 .464.034.63.102l-.007 1.67zm5.075 6.445c-1.128 0-2.042-.355-2.743-1.065-.7-.71-1.051-1.657-1.051-2.838v-.22c0-.791.153-1.498.458-2.12a3.484 3.484 0 011.285-1.454 3.398 3.398 0 011.846-.52c1.079 0 1.913.344 2.501 1.032.588.689.883 1.663.883 2.923v.718h-5.179c.054.654.273 1.171.656 1.552s.865.572 1.446.572c.816 0 1.48-.33 1.993-.99l.96.916a3.204 3.204 0 01-1.272 1.103c-.53.26-1.124.391-1.783.391zm-.212-6.79c-.489 0-.883.172-1.183.514-.3.341-.492.817-.575 1.428h3.39v-.132c-.038-.596-.197-1.046-.475-1.351-.279-.305-.664-.458-1.157-.458zm9.373 2.608c0-.776.154-1.475.462-2.098a3.37 3.37 0 011.296-1.436c.557-.334 1.196-.501 1.92-.501 1.068 0 1.936.344 2.603 1.032.666.689 1.027 1.602 1.08 2.74l.008.417c0 .781-.15 1.48-.45 2.095a3.33 3.33 0 01-1.29 1.428c-.559.337-1.205.505-1.937.505-1.118 0-2.013-.372-2.685-1.116-.67-.745-1.007-1.738-1.007-2.978v-.088zm1.78.154c0 .816.169 1.454.506 1.915.336.462.805.693 1.406.693.6 0 1.068-.235 1.402-.704.335-.468.502-1.154.502-2.058 0-.8-.172-1.435-.516-1.904-.345-.469-.812-.703-1.403-.703-.58 0-1.042.23-1.384.692-.342.462-.513 1.151-.513 2.07zM173.06 45v-6.606h-1.209v-1.319h1.209v-.725c0-.879.244-1.558.732-2.036.489-.479 1.172-.718 2.051-.718.313 0 .645.044.996.132l-.044 1.392a3.505 3.505 0 00-.68-.059c-.85 0-1.275.437-1.275 1.311v.703h1.611v1.319h-1.611V45h-1.78zm11.3-7.925l.051.828c.557-.65 1.319-.974 2.285-.974 1.06 0 1.785.405 2.176 1.216.576-.811 1.386-1.216 2.431-1.216.874 0 1.525.241 1.952.725.427.483.646 1.196.656 2.138V45h-1.78v-5.156c0-.503-.11-.872-.33-1.106-.22-.235-.583-.352-1.09-.352-.406 0-.737.109-.993.326a1.719 1.719 0 00-.539.853l.008 5.435h-1.78v-5.215c-.025-.932-.5-1.399-1.428-1.399-.713 0-1.219.29-1.516.872V45h-1.78v-7.925h1.677zm11.645 3.89c0-.777.154-1.476.461-2.099a3.37 3.37 0 011.297-1.436c.556-.334 1.196-.501 1.919-.501 1.069 0 1.937.344 2.603 1.032.667.689 1.027 1.602 1.08 2.74l.008.417c0 .781-.15 1.48-.45 2.095a3.33 3.33 0 01-1.29 1.428c-.559.337-1.204.505-1.937.505-1.118 0-2.013-.372-2.684-1.116-.671-.745-1.007-1.738-1.007-2.978v-.088zm1.78.153c0 .816.168 1.454.505 1.915.337.462.806.693 1.406.693.6 0 1.068-.235 1.403-.704.334-.468.502-1.154.502-2.058 0-.8-.173-1.435-.517-1.904-.344-.469-.812-.703-1.402-.703-.581 0-1.043.23-1.385.692-.341.462-.512 1.151-.512 2.07zm9.345-4.043l.051.916c.586-.708 1.355-1.062 2.307-1.062 1.65 0 2.49.945 2.52 2.834V45h-1.78v-5.134c0-.503-.109-.876-.326-1.117-.217-.242-.572-.363-1.066-.363-.717 0-1.252.325-1.604.974V45h-1.78v-7.925h1.678zm10.78 8.071c-1.127 0-2.042-.355-2.742-1.065-.701-.71-1.051-1.657-1.051-2.838v-.22c0-.791.152-1.498.457-2.12a3.484 3.484 0 011.286-1.454 3.398 3.398 0 011.845-.52c1.08 0 1.913.344 2.502 1.032.588.689.882 1.663.882 2.923v.718h-5.178c.054.654.272 1.171.655 1.552.384.381.866.572 1.447.572.815 0 1.48-.33 1.992-.99l.96.916a3.204 3.204 0 01-1.271 1.103c-.53.26-1.124.391-1.784.391zm-.212-6.79c-.488 0-.882.172-1.183.514-.3.341-.492.817-.575 1.428h3.391v-.132c-.039-.596-.197-1.046-.476-1.351-.278-.305-.664-.458-1.157-.458zm8.049 4.095l1.611-5.376h1.897l-3.15 9.126c-.483 1.333-1.303 2-2.46 2a3.18 3.18 0 01-.857-.132v-1.377l.337.022c.449 0 .787-.082 1.014-.245.227-.164.407-.439.538-.824l.257-.682-2.783-7.888h1.919l1.677 5.376z" fill="#FFF"/></g>
                    </svg>
                </a>
              </div>
              <div id="tweetBody" class="lg:mt-3 lg:mb-2 lg:leading-normal whitespace-pre-wrap_ text-sm lg:text-lg text-gray-700 px-4 lg:px-8 py-1">
                <em>Ethiopian-based group Project Mano is lobbying the government to mine, hold and link Bitcoin to the Ethiopian birr or other legal tenders.</em>
              </div>
              <div class="my-1 lg:my-3">
                <a class="text-gray-500 text-sm hover:underline mx-4 lg:mx-8" href="https://cointelegraph.com/news/jack-dorsey-notes-lobbying-efforts-to-get-ethiopian-gov-t-to-embrace-bitcoin" target="_blank" rel="noopener noreferrer"> Jun 16, 2021 </a>
              </div>
            </div>';

 

}