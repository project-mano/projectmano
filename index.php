<?php
  require_once('stats.php');
  require_once('TestimonialTweets.php');
  $plans = array(
    array(
      'plan' => 'Mining',
      'icon' => 'bitminer.svg',
      'iconStyle' => 'w-32 md:w-40 lg:w-52',
      'descr' => 'If the GERD is successful and put into use as planned, the average Ethiopian’s life would improve - not just because they would have access to electric power 24/7, but also because their country would have more foreign currency reserves that it can use to improve the lives of its citizens.',
    ),
    array(
      'plan' => 'Hodling',
      'icon' => 'hodl.svg',
      'iconStyle' => 'w-28 md:w-32 lg:w-38',
      'descr' => 'holding some BTC in a reserve is likely going to guard the ETB from slumping, more effectively than the plans the National Bank has been implementing and considering to our knowledge.',
    ),
    array(
      'plan' => 'Linking BTC to ETB or Other Legal Tenders',
      'icon' => 'link.svg',
      'iconStyle' => 'w-28 md:w-32 lg:w-40',
      'descr' => 'El Salvador became the first country to start treating Bitcoin as legal tender. It means that within the country people can use it to buy and sell things legally, including but not limited to paying taxes and employees with it.',
    ),
  );
  $c = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project Mano - Bitcoin for Ethiopia</title>
  <link rel="icon" href="./assets/svgs/EthFlagWhiteBit.svg" type="image/svg+xml">
  <link rel="stylesheet" href="./assets/css/tailwind.min.css">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/aos.min.css">
  <!--[if lt IE 9]>
  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
<body>
  <div class="antialiased tracking-wide leading-relaxed min-h-screen">
    <section id="main" class="lg:h-screen py-2 bg-gradient-to-br from-indigo-900 to-gray-900 shadow-2xl relative _border-b-4 border-yellow-700 z-40">
      <div class="mx-auto lg:px-24">
      <nav class="py-2 lg:px-28 md:px-5 flex flex-col md:flex-row items-center lg:mt-4 space-y-3 md:space-y-0 justify-between lg:mr-4 text-white">
          <div class="flex justify-center items-center space-x-1">
            <a href="./"> 
                <div class="flex justify-center items-center space-x-2">
                    <img src="./assets/imgs/mano.png" class="h-auto w-14 mr-1" alt="">
                    <span class="flex relative flex-col">
                        <h2 class="text-2xl text-gray-300 font-semibold tracking-widest _uppercase">Project Mano</h2>
                        <span class="flex justify-center items-center space-x-1 text-gray-500 absolute top-7 text-sm right-0">
                        <div class="flex flex-col space-y-1">
                            <span class="inline-flex h-1 w-1 rounded-full bg-yellow-400 opacity-75"></span>
                            <span class="inline-flex h-1 w-1 rounded-full bg-yellow-400 opacity-75"></span>
                        </div>
                        <span class="text-lg">
                            Initiative
                        </span>
                        </span>
                    </span>
                </div>
            </a>
          </div>
          <div class="flex flex-row items-center justify-center my-auto space-x-2 md:space-x-4 px-2 md:px-0 index999">
            <a data-scroll href="./#intro" class="px-2 text-gray-200 font-bolder tracking-wider lg:text-lg border-b border-indigo-900 border-opacity-0 py-2 hover:border-yellow-800 transition duration-500">
              Intro
            </a>
            <a data-scroll href="./#whyEth" class="px-2 text-gray-200 font-bolder tracking-wider lg:text-lg border-b border-indigo-900 border-opacity-0 py-2 hover:border-yellow-800 transition duration-500">
              Why Ethiopia
            </a>
            <a data-scroll href="./#plan" class="px-2 text-gray-200 font-bolder tracking-wider lg:text-lg border-b border-indigo-900 border-opacity-0 py-2 hover:border-yellow-800 transition duration-500">
              Plan
            </a>
            <a data-scroll href="./#test" class="px-2 text-gray-200 font-bolder tracking-wider lg:text-lg border-b border-indigo-900 border-opacity-0 py-2 hover:border-yellow-800 transition duration-500">
              Testimonials
            </a>

            <div class="flex items-center justify-center">

              <label for="themeSwitch" class="flex items-center cursor-pointer lg:ml-4">
                <div class="relative">
                  <input type="checkbox" id="themeSwitch" class="sr-only bg-green-700 shadow-inner">
                  <div class="block bg-transparent border border-gray-400 shadow-lg w-12 h-6 rounded-full flex justify-between">

                    <svg class="w-3 absolute left-2 top-1.5 h-3 fill-current text-yellow-300" viewBox="0 0 512 512" class="sun-svg">
                      <path id="sun-svg" d="M256 160c-52.9 0-96 43.1-96 96s43.1 96 96 96 96-43.1 96-96-43.1-96-96-96zm246.4 80.5l-94.7-47.3 33.5-100.4c4.5-13.6-8.4-26.5-21.9-21.9l-100.4 33.5-47.4-94.8c-6.4-12.8-24.6-12.8-31 0l-47.3 94.7L92.7 70.8c-13.6-4.5-26.5 8.4-21.9 21.9l33.5 100.4-94.7 47.4c-12.8 6.4-12.8 24.6 0 31l94.7 47.3-33.5 100.5c-4.5 13.6 8.4 26.5 21.9 21.9l100.4-33.5 47.3 94.7c6.4 12.8 24.6 12.8 31 0l47.3-94.7 100.4 33.5c13.6 4.5 26.5-8.4 21.9-21.9l-33.5-100.4 94.7-47.3c13-6.5 13-24.7.2-31.1zm-155.9 106c-49.9 49.9-131.1 49.9-181 0-49.9-49.9-49.9-131.1 0-181 49.9-49.9 131.1-49.9 181 0 49.9 49.9 49.9 131.1 0 181z">
                      </path>
                    </svg>
                    <svg class="w-3 absolute right-2_ top-1.5 h-3 fill-current text-yellow-700" style="right: 0.57rem;" viewBox="0 0 512 512" class="moon-svg">
                      <path id="moon-svg" d="M283.211 512c78.962 0 151.079-35.925 198.857-94.792 7.068-8.708-.639-21.43-11.562-19.35-124.203 23.654-238.262-71.576-238.262-196.954 0-72.222 38.662-138.635 101.498-174.394 9.686-5.512 7.25-20.197-3.756-22.23A258.156 258.156 0 0 0 283.211 0c-141.309 0-256 114.511-256 256 0 141.309 114.511 256 256 256z">
                      </path>
                    </svg>

                  </div>
                  <div class="dot absolute left-2 top-1 bg-green-700 shadow-inner w-4 h-4 rounded-full transition"></div>
                </div>
              </label>

            </div>

          </div>
        </nav>

        <div class="text-center py-1 lg:py-2 space-y-1 lg:mt-40">
          <div class="lg:py-3 leading-8 font-extrabold text-green-600 text-xl lg:text-4xl">
            A Plan to Rescue A Nation’s Economy
          </div>
          <div class="max-w-xl lg:max-w-2xl lg:text-2xl text-gray-400 mx-auto">
            Part of Project Mano Efforts
          </div>
        </div>

        <div class="flex justify-between lg:py-0 py-3" data-theme>
          <div class="flex whitespace-nowrap flex-col space-y-2 lg:absolute left-0 lg:mt-10 items-start justify-center index999">
            <div data-aos="fade-right" data-aos-delay="100" id="leftT" title="1 Bitcoin equals <?=number_format($btcStat[0]);?> U.S. Dollars" class="flex items-center justify-between shadow-lg bg-green-600 text-white rounded-r-full px-4 tracking-wider py-1 md:py-2 w-40 md:w-44"><span class="flex flex-_ justify-between space-x-1 items-center"><span class="text-sm font-semibold">1<small>BTC</small></span> <span>=</span> <span><?=$btcStat[1];?><small>USD</small></span></span></div>
            <div data-aos="fade-right" data-aos-delay="200" id="leftB" title="1 U.S. Dollar equals <?=number_format($etbPrice, 2);?> Ethiopian Birr" class="border border-gray-200 shadow-lg w-4/5 bg-gray-200 text-dark rounded-r-full px-4 tracking-wider py-1 md:py-2"><span class="flex flex-_ justify-between space-x-1 items-center"><span class="text-sm font-semibold">1<small>USD</small></span><span>=</span><span><?=number_format($etbPrice);?><small>ETB</small></span></span></div>
          </div>
          <div class="flex whitespace-nowrap flex-col space-y-2 lg:absolute right-0 lg:mt-10 items-end justify-center index999">
            <div data-aos="fade-left" data-aos-delay="100" id="rightT" title="Gold's performance the past year." class="shadow-lg bg-green-600 text-white rounded-l-full px-4 md:px-8 tracking-wider py-1 md:py-2 w-40 md:w-44 text-right">GOLD <span class='text-sm text-red-700'>-7.70%</span></div>
            <div data-aos="fade-left" data-aos-delay="200" id="rightB" title="Bitcoin's performance the past year." class="border border-gray-200 shadow-lg w-4/5 bg-gray-200 text-dark rounded-l-full px-4 md:px-8 tracking-wider py-1 md:py-2 text-right">BTC <span class='text-sm text-green-700'>+329%</span></div>
          </div>
        </div>

      </div>

      <div id="particles-js" class="opacity-0 lg:opacity-100 absolute transition-all ease-in-out transform hover:-translate-y-1 duration-500 top-24 index99 w-full max-h-screen"></div>

      <img src="./assets/imgs/adwaFull.png" class="index0 absolute transform -translate-x-1/2 left-1/2 bottom-0 opacity-40 lg:opacity-50 z-0 hidden lg:block" style="width: 45rem;" alt="">

      <div class="absolute transform transition ease-in-out duration-300 bottom-0 bg-gradient-to-r from-yellow-500 to-yellow-800 opacity-75 h-0.5 lg:h-1 w-full"></div>

    </section>
    <section id="intro" class="lg:py-2 bg-gradient-to-br from-indigo-900 to-gray-900 shadow-2xl relative">

      <div class="flex justify-center items-center md:justify-start pt-3 px-4 sm:px-6 lg:px-28 lg:mt-10 hidden md:block">
        <span class="bg-clip-text text-3xl lg:text-4xl text-transparent bg-gradient-to-r from-green-400 to-blue-500">
          Intro
        </span>
      </div>
      <div class="flex justify-between items-center md:flex-none pt-3 md:pt-0">

        <svg class="w-32 md:w-44 pr-2 top-0 lg:w-52 h-8" viewBox="0 0 216 8" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect y="3" width="208" height="2" fill="url(#paint0_linear)"/>
          <circle cx="212" cy="4" r="4" fill="#DB910D" fill-opacity="0.8"/>
          <defs>
          <linearGradient id="paint0_linear" x1="72.4324" y1="3.88887" x2="189.405" y2="3.88883" gradientUnits="userSpaceOnUse">
          <stop stop-color="#F59E0B" stop-opacity="0.8"/>
          <stop offset="1" stop-color="#B45309" stop-opacity="0.44"/>
          </linearGradient>
          </defs>
        </svg>
        <span class="bg-clip-text text-3xl flex-1 text-center lg:text-4xl text-transparent bg-gradient-to-r from-green-400 to-blue-500 block md:hidden">
          Intro
        </span>
        <svg class="w-32 md:w-44 pr-2 top-0 lg:w-52 h-8 transform rotate-180 ml-auto block md:hidden" viewBox="0 0 216 8" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect y="3" width="208" height="2" fill="url(#paint0_linear)"/>
          <circle cx="212" cy="4" r="4" fill="#DB910D" fill-opacity="0.8"/>
          <defs>
          <linearGradient id="paint0_linear" x1="72.4324" y1="3.88887" x2="189.405" y2="3.88883" gradientUnits="userSpaceOnUse">
          <stop stop-color="#F59E0B" stop-opacity="0.8"/>
          <stop offset="1" stop-color="#B45309" stop-opacity="0.44"/>
          </linearGradient>
          </defs>
        </svg>
        
      </div>
      
      <div class="mx-auto px-0 lg:px-28">

        <!-- <div class="hidden md:block absolute left-0 bg-gradient-to-r from-yellow-500 to-yellow-700 opacity-75 h-0.5 w-52" style="top:6em;"></div>
        <span class="hidden md:block absolute inline-flex left-52 h-2 w-2 rounded-full bg-yellow-400 opacity-75" style="top:5.8em;"></span> -->

        <div data-theme class="bg-gray-100 lg:bg-gradient-to-l from-gray-500 via-gray-300 to-gray-100 text-black text-lg shadow-lg px-6 py-6 mt-4 lg:mt-16">

          <div class="flex text-lg">
            <div class="w-full lg:w-3/5 flex flex-col space-y-2 max-w-4xl_ items-center">
              <p>
                The global economy is inflating out of control and Ethiopia is no exception to its effects. In March 2018, the Ethiopian Birr (ETB) was trading at 22 ETB per USD (US Dollars) and the black market exchange was near 25 ETB / USD in Mar 2018. Now, in Q1 2021, 1 USD is worth nearly 46 ETB - nearing 55 ETB in the black market.
              </p>
              <img src="./assets/imgs/notes.png" alt="" class="max-w-xs block py-3 lg:hidden">
            </div>
          </div>
          <p class="mt-2 lg:mt-5">
            That's a huge margin. In recent years, there has been a worldwide rise wave of ethnic conflict, finger-pointing, and apparent inequality. It is visible in Ethiopia too. While this may seem unrelated on the surface, it is a growing hypothesis that these occurrences may all be linked to the inflationary nature of the global economy. USD for instance is no longer linked to a scarce resource, there is nothing stopping the Federal Reserve from printing it excessively leaving countries that rely on holding it vulnerable to other nations monetary policies.
          </p>
          <p class="mt-2 lg:mt-5">
            Bitcoin, unlike fiat or other crypto, offers various avenues through which Ethiopia as a country can work around this; relying some of our energy and forex on an asset that is created to be at the mercy of the global free market, rather than at the mercy of few people’s hands. We will discuss three primary methods through which we believe Ethiopia as a country could benefit: Mining, Hodling, or seeing it as tender, and combined use.
          </p>

        </div>

        <div data-aos="fade-left" data-aos-delay="300" class="hidden lg:block w-1/3 _px-6 absolute right-12 top-32 _p-10">
          <img src="./assets/imgs/notes.png" alt="">
        </div>


        <div class="flex hidden md:block space-x-4 px-6 lg:px-0 py-3 lg:py-16">
          <span class="inline-flex h-4 w-4 shadow-lg rounded-full bg-yellow-600 opacity-60"></span>
          <span class="inline-flex h-4 w-4 shadow-lg rounded-full bg-yellow-500 opacity-60"></span>
          <span class="inline-flex h-4 w-4 shadow-lg rounded-full bg-yellow-400 opacity-60"></span>
          <!-- <span class="inline-flex h-4 w-4 shadow-lg rounded-full bg-yellow-300 opacity-60"></span> -->
        </div>


      </div>

    </section>
    <section id="money" class="pt-2 bg-gradient-to-br from-indigo-900 to-gray-900 shadow-2xl relative">
      <div class="flex justify-center items-center md:justify-start px-4 sm:px-6 lg:px-28 lg:mt-10 hidden md:block">
        <span class="bg-clip-text text-3xl lg:text-4xl text-transparent bg-gradient-to-r from-green-400 to-blue-500">
          Money
        </span>
      </div>
      <div class="flex justify-between items-center md:flex-none">

        <svg class="w-32 md:w-44 pr-2 top-0 lg:w-52 h-8" viewBox="0 0 216 8" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect y="3" width="208" height="2" fill="url(#paint0_linear)"/>
          <circle cx="212" cy="4" r="4" fill="#DB910D" fill-opacity="0.8"/>
          <defs>
          <linearGradient id="paint0_linear" x1="72.4324" y1="3.88887" x2="189.405" y2="3.88883" gradientUnits="userSpaceOnUse">
          <stop stop-color="#F59E0B" stop-opacity="0.8"/>
          <stop offset="1" stop-color="#B45309" stop-opacity="0.44"/>
          </linearGradient>
          </defs>
        </svg>
        <span class="bg-clip-text text-3xl flex-1 text-center lg:text-4xl text-transparent bg-gradient-to-r from-green-400 to-blue-500 block md:hidden">
          Money
        </span>
        <svg class="w-32 md:w-44 pr-2 top-0 lg:w-52 h-8 transform rotate-180 ml-auto block md:hidden" viewBox="0 0 216 8" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect y="3" width="208" height="2" fill="url(#paint0_linear)"/>
          <circle cx="212" cy="4" r="4" fill="#DB910D" fill-opacity="0.8"/>
          <defs>
          <linearGradient id="paint0_linear" x1="72.4324" y1="3.88887" x2="189.405" y2="3.88883" gradientUnits="userSpaceOnUse">
          <stop stop-color="#F59E0B" stop-opacity="0.8"/>
          <stop offset="1" stop-color="#B45309" stop-opacity="0.44"/>
          </linearGradient>
          </defs>
        </svg>
        
      </div>

      <div class="mx-auto h-full">


        <!-- <div class="absolute left-0 bg-gradient-to-r from-yellow-500 to-yellow-700 opacity-75 h-0.5 w-52" style="top:7em;"></div>
        <span class="absolute inline-flex left-52 h-2 w-2 rounded-full bg-yellow-400 opacity-75" style="top:6.8em;"></span> -->

        <div data-theme class="h-full bg-gray-100 lg:bg-gradient-to-bl from-gray-100 via-gray-300 to-gray-500 text-black text-lg shadow-lg px-6 lg:px-0 py-6 mt-3 lg:mt-4">

          <div class="lg:px-32 lg:py-2">
            <p>
              Until recently, the global economy was mostly reliant on a somewhat scarce form of money, namely gold. Scarcity made the money valuable and made it impossible for anybody to manipulate and multiply it at will. In the past, literal paper money was often used to represent a certain amount of gold, with the promise that the money given to you by the government actually represented gold that the government’s bank held for you.
            </p>
          </div>
          <div class="flex flex-col lg:flex-row justify-between items-center lg:px-10">
            <div data-aos="zoom-in" data-aos-delay="100" class="h-full w-10/12 md:w-6/12 px-4 py-4 lg:py-0">
              <img src="./assets/imgs/gold-coins.png" alt="">
            </div>

            <!-- </div> -->
            <div class="lg:w-10/12 flex flex-col space-y-2 lg:py-6 max-w-4xl_ pr-4 lg:pl-3 lg:pr-10">
              <p>
                <a href="https://www.wtfhappenedin1971.com" class="text-blue-500 border-b transform duration-500 border-transparent hover:border-blue-400" target="__blank">1971</a> is the year that gold and money got officially separated. Before then, there was a period (unclear how long) when the US was pretending that you could exchange USD for gold when you could not. As long as you didn’t ask for too much gold, the US banks were happy to abide. But, because their supply did not match the number of papers they had secretly printed, President Nixon eventually had to formally announce that the US would no longer be giving Gold for USD. Officially backing the value of the currency by the promise of the government, allowing them to print as they pleased.
              </p>
              <p class="pt-2 lg:pt-3">
                Bitcoin, unlike fiat or other crypto, offers various avenues through which Ethiopia as a country can work around this; relying some of our energy and forex on an asset that is created to be at the mercy of the global free market, rather than at the mercy of few people’s hands. We will discuss three primary methods through which we believe Ethiopia as a country could benefit: Mining, Hodling, or seeing it as tender, and combined use.
              </p>
            </div>
          </div>

        </div>

      </div>

    </section>
    <section id="whyEth" class="lg:h-screen pt-3 lg:pt-2 bg-gradient-to-br from-indigo-900 to-gray-900 shadow-2xl relative">
     
      <div class="flex justify-center items-center md:justify-start px-4 sm:px-6 lg:px-28 lg:mt-10 hidden md:block lg:mb-3">
        <div class="flex items-center space-x-2">

          <img src="./assets/svgs/EthFlagWhiteBit.svg" class="w-10 h-10" alt="">
          <span class="bg-clip-text text-3xl text-transparent bg-gradient-to-r from-green-500 via-yellow-600 to-red-600">
            Why Ethiopia?
          </span>

        </div>
      </div>
      <div class="flex justify-between items-center md:flex-none">

        <svg class="w-24 sm:w-32 pr-2 top-0 md:w-80 h-8" viewBox="0 0 216 8" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect y="3" width="208" height="2" fill="url(#paint0_linear)"/>
          <circle cx="212" cy="4" r="4" fill="#DB910D" fill-opacity="0.8"/>
          <defs>
          <linearGradient id="paint0_linear" x1="72.4324" y1="3.88887" x2="189.405" y2="3.88883" gradientUnits="userSpaceOnUse">
          <stop stop-color="#F59E0B" stop-opacity="0.8"/>
          <stop offset="1" stop-color="#B45309" stop-opacity="0.44"/>
          </linearGradient>
          </defs>
        </svg>
        <div class="flex flex-1 items-center justify-center px-4 sm:px-6 lg:px-28 space-x-2 block md:hidden lg:mb-3">

          <img src="./assets/svgs/EthFlagWhiteBit.svg" class="w-8 lg:w-10 h-8 lg:h-10" alt="">
          <span class="bg-clip-text text-lg lg:text-xl text-transparent text-center bg-gradient-to-r from-green-500 via-yellow-600 to-red-600">
            Why Ethiopia?
          </span>

        </div>
        <svg class="w-24 sm:w-32 pr-2 top-0 lg:w-52 h-8 transform rotate-180 ml-auto block md:hidden" viewBox="0 0 216 8" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect y="3" width="208" height="2" fill="url(#paint0_linear)"/>
          <circle cx="212" cy="4" r="4" fill="#DB910D" fill-opacity="0.8"/>
          <defs>
          <linearGradient id="paint0_linear" x1="72.4324" y1="3.88887" x2="189.405" y2="3.88883" gradientUnits="userSpaceOnUse">
          <stop stop-color="#F59E0B" stop-opacity="0.8"/>
          <stop offset="1" stop-color="#B45309" stop-opacity="0.44"/>
          </linearGradient>
          </defs>
        </svg>
        
      </div>

      <div class="mx-auto px-0 lg:px-28 ">

        <div data-theme class="bg-gray-100 text-black text-lg shadow-lg px-6 py-8 mt-2 lg:mt-6">

          <div class="flex flex-col space-y-2">
            <p>
              There are countless reasons why Ethiopia and why now. Ethiopia seems to be the country best positioned to begin embracing Bitcoin for various reasons:
            </p>

            <ol class="flex flex-col space-y-1 lg:space-y-2 list-decimal px-5 md:px-6 lg:px-14 lg:leading-loose py-2 mb-2">
              <li>There is clear interest in the crypto space from the government (e.g. Cardano Implementation).</li>
              <li>Country is experiencing high inflation margins because of internal conflict and covid.</li>
              <li>It has a significant trade deficit that can’t easily be solved through traditional investments, which requires innovative thinking.</li>
              <li>There is an unassigned and already built 6469MW that is politically & financially awkward to use.</li>
              <li>It still uses paper cash as a primary method of transaction, which doesn’t allow the central bank to sync all parameters of the economy to work together efficiently.</li>
              <li>Because most of the population (~55%) is unbanked, once money reaches the hands of some of the population, the government and banks do not see much of it again. This makes it difficult to recycle; the government is required to print new cash to establish new spending abilities, devaluing the currency even more.</li>
              <li>It will be a win-win case for Bitcoin & Ethiopia if the Bitcoin network gets 6k MW of clean renewable energy; simultaneously advancing Ethiopia's accelerating economy & attracting new investment.</li>
            </ol>
          </div>

        </div>




      </div>

    </section>
    <section id="plan" class="pt-2 bg-gradient-to-br from-indigo-900 to-gray-900 shadow-2xl relative">
      <div class="flex flex-col justify-center items-center space-y-2">
        <h1 class="uppercase text-center text-white font-bolder py-2 text-xl tracking-wider">How Ethiopia Could Monetize Bitcoin & Escape the Industrial Phase</h1>
        <div data-aos="flip-left" class="lg:w-1/3 w-2/3 bg-gradient-to-r from-yellow-500 to-yellow-700 h-0.5"></div>
      </div>

      <div data-theme class="mx-auto mt-6 lg:mt-10 bg-gray-100 text-black shadow-lg relative">

        <div class="flex flex-col lg:flex-row space-y-5 lg:space-y-0 justify-between items-start lg:_mb-12 px-6 lg:px-8 pt-4 lg:pt-8">

          <?php foreach ($plans as $plan) {
            $c++; ?>
            <div class="flex flex-col justify-center items-center space-y-4 flex-1 my-3 md:my-0">
              <div class="relative card lg:mb-4 rounded shadow-xl border border-yellow-500 w-44 md:w-48 lg:w-64 h-44 md:h-48 lg:h-64 flex items-center justify-center">
                <div class="absolute -left-3 top-2 border border-pink-400 px-2 lg:px-3 py-3 lg:py-4 text-gray-500 text-lg lg:text-2xl bg-gray-100 shadow-lg"><?= sprintf("%02d", $c); ?></div>
                <img src="./assets/imgs/<?= $plan['icon']; ?>" class="<?= $plan['iconStyle']; ?> h-auto" alt="">
              </div>
              <h2 class="text-xl lg:text-2xl text-gray-800 font-semibold tracking-wider text-center"><?= $plan['plan']; ?></h2>

              <p class="md:px-8 text-center lg:text-left">
                <?= $plan['descr']; ?>
              </p>

            </div>
          <?php } ?>

        </div>
        <center class="transform mt-5 lg:mt-0 lg:translate-y-8">
          <a href="./plan.php" data-aos="zoom-out" class="px-4 lg:px-6 py-1 lg:py-2 bg-gradient-to-l from-purple-700 to-pink-700 border-gray-800 shadow-lg cursor-pointer hover:from-purple-800 hover:to-pink-800 text-white rounded-full">Read More</a>
        </center>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 156 1440 160">
          <path fill="#202253" fill-opacity="1" d="M0,256L48,266.7C96,277,192,299,288,293.3C384,288,480,256,576,245.3C672,235,768,245,864,256C960,267,1056,277,1152,261.3C1248,245,1344,203,1392,181.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
      </div>



    </section>
    <section id="test" class="lg:h-screen py-2 bg-gradient-to-br from-indigo-900 to-gray-900 shadow-2xl relative">

      <div class="mx-auto px-4 sm:px-6 lg:px-20 lg:mt-10">

        <div style="min-height:85vh;" class="flex flex-col justify-between bg-gradient-to-b from-yellow-800 via-gray-300_ to-transparent text-black text-lg _shadow-lg px-6 py-6 mt-14 rounded-t-xl _border-2 border-yellow-600">

          <h1 class="text-3xl lg:px-4 lg:py-6 text-white filter drop-shadow-lg">Testimonials</h1>
          <div data-theme class="relative_ w-11/12 md:w-3/4 shadow-r-lg overflow-x-auto absolute sm:-right-6 lg:right-0 top-1/4 flex justify-between space-x-4 md:space-x-8 items-center pr-8 lg:pr-4" id="tweets">
            <?php echo $tweetsList; ?>
          </div>
        </div>

        <div class="flex justify-end px-7 transform -translate-y-6 lg:-translate-y-3">
          <div class="flex mt-10 space-x-2 hidden">
            <?php for ($i = 0; $i <= 4; $i++) {
              $bgColor = $i == 0 ? 'bg-green-400' : 'bg-white'; ?>
              <span class="inline-flex h-2 w-2 shadow-lg rounded-full <?= $bgColor; ?> opacity-60 hover:opacity-100 cursor-pointer"></span>
            <?php } ?>
          </div>
          <div class="flex justify-center items-center space-x-2">
            <svg id="scrLeft" class="w-12 h-6 cursor-pointer" viewBox="0 0 42 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M7 1L1 8L7 15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M0.999998 8L41 8" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <svg id="scrRight" class="w-6 h-6 cursor-pointer" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g>
                <path d="M15 15L21 8L15 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M21 8H1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </g>
            </svg>
          </div>
        </div>

      </div>

    </section>

    <section class="flex flex-col items-center justify-between pt-2 bg-gradient-to-br from-indigo-900 to-gray-900 shadow-2xl relative">

      <div class="flex-1 mx-auto px-4 sm:px-6 lg:px-24 lg:py-3">
        <div class="flex justify-between items-center flex-col text-white">
          <div class="flex flex-col md:flex-row items-center space-x-5">

            <p class="index99 text-xl lg:text-2xl lg:mt-10">
              <span class="text-yellow-500">Project Mano</span> is just getting started! We will not stop! We are unstoppable! We are a crowd! Just like Bitcoin, Mano is an idea - we believe once it's out there, it's impossible to kill and will eventually be implemented. Please do your part and share and/or contribute to this project that's dear to our hearts!
            </p>
            <img src="./assets/imgs/projectManoGold.png" class="opacity-70 index0 w-52 md:w-48 lg:w-64 py-3 md:py-2 lg:py-0 transform lg:translate-y-10 lg:translate-x-10" alt="">

          </div>
          <div class="flex flex-col py-2 lg:py-0 space-y-2 lg:space-y-0">

            <div class="flex space-x-8 md:space-x-12 lg:mx-0 mx-auto cursor-pointer py-2 lg:py-6">
              <a href="https://www.facebook.com/projectmano" target="__blank" class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current mr-2 text-white transform rounded-lg duration-300 hover:text-yellow-600 w-9" viewBox="0 0 24 24">
                  <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                </svg>
              </a>
              <a href="https://www.twitter.com/projectmano" target="__blank" class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current mr-2 text-white transform duration-300 hover:text-yellow-600 w-9" viewBox="0 0 24 24">
                  <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                </svg>
              </a>
              <a href="https://github.com/project-mano" target="__blank" class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current mr-2 text-white transform duration-300 hover:text-yellow-600 w-9" viewBox="0 0 24 24">
                  <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                </svg>
              </a>
              <a href="https://www.instagram.com/project.mano" target="__blank" class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current mr-2 text-white transform duration-300 hover:text-yellow-600 w-9" viewBox="0 0 24 24">
                  <path d="M11.984 16.815c2.596 0 4.706-2.111 4.706-4.707 0-1.409-.623-2.674-1.606-3.538-.346-.303-.735-.556-1.158-.748-.593-.27-1.249-.421-1.941-.421s-1.349.151-1.941.421c-.424.194-.814.447-1.158.749-.985.864-1.608 2.129-1.608 3.538 0 2.595 2.112 4.706 4.706 4.706zm.016-8.184c1.921 0 3.479 1.557 3.479 3.478 0 1.921-1.558 3.479-3.479 3.479s-3.479-1.557-3.479-3.479c0-1.921 1.558-3.478 3.479-3.478zm5.223.369h6.777v10.278c0 2.608-2.114 4.722-4.722 4.722h-14.493c-2.608 0-4.785-2.114-4.785-4.722v-10.278h6.747c-.544.913-.872 1.969-.872 3.109 0 3.374 2.735 6.109 6.109 6.109s6.109-2.735 6.109-6.109c.001-1.14-.327-2.196-.87-3.109zm2.055-9h-12.278v5h-1v-5h-1v5h-1v-4.923c-.346.057-.682.143-1 .27v4.653h-1v-4.102c-1.202.857-2 2.246-2 3.824v3.278h7.473c1.167-1.282 2.798-2 4.511-2 1.722 0 3.351.725 4.511 2h7.505v-3.278c0-2.608-2.114-4.722-4.722-4.722zm2.722 5.265c0 .406-.333.735-.745.735h-2.511c-.411 0-.744-.329-.744-.735v-2.53c0-.406.333-.735.744-.735h2.511c.412 0 .745.329.745.735v2.53z" />
                </svg>
                <!-- <svg fill="#000000" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" class="fill-current mr-2 text-white transform duration-300 hover:text-yellow-600 w-9"><path d="M46.137,6.552c-0.75-0.636-1.928-0.727-3.146-0.238l-0.002,0C41.708,6.828,6.728,21.832,5.304,22.445	c-0.259,0.09-2.521,0.934-2.288,2.814c0.208,1.695,2.026,2.397,2.248,2.478l8.893,3.045c0.59,1.964,2.765,9.21,3.246,10.758	c0.3,0.965,0.789,2.233,1.646,2.494c0.752,0.29,1.5,0.025,1.984-0.355l5.437-5.043l8.777,6.845l0.209,0.125	c0.596,0.264,1.167,0.396,1.712,0.396c0.421,0,0.825-0.079,1.211-0.237c1.315-0.54,1.841-1.793,1.896-1.935l6.556-34.077	C47.231,7.933,46.675,7.007,46.137,6.552z M22,32l-3,8l-3-10l23-17L22,32z"/></svg> -->
              </a>
              <a href="https://t.me/projectmano" target="__blank" class="flex items-center">
                <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" class="fill-current mr-2 text-white transform duration-300 hover:text-yellow-600 w-9">
                  <path d="M46.137,6.552c-0.75-0.636-1.928-0.727-3.146-0.238l-0.002,0C41.708,6.828,6.728,21.832,5.304,22.445	c-0.259,0.09-2.521,0.934-2.288,2.814c0.208,1.695,2.026,2.397,2.248,2.478l8.893,3.045c0.59,1.964,2.765,9.21,3.246,10.758	c0.3,0.965,0.789,2.233,1.646,2.494c0.752,0.29,1.5,0.025,1.984-0.355l5.437-5.043l8.777,6.845l0.209,0.125	c0.596,0.264,1.167,0.396,1.712,0.396c0.421,0,0.825-0.079,1.211-0.237c1.315-0.54,1.841-1.793,1.896-1.935l6.556-34.077	C47.231,7.933,46.675,7.007,46.137,6.552z M22,32l-3,8l-3-10l23-17L22,32z" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="flex-1  bg-gradient-to-b from-red-900 to-indigo-900 opacity-70 w-full block lg:hidden" id="footerAdwaLayer">
        <div class="flex flex-col justify-center items-center py-5 space-y-6 lg:space-y-8 index99">
          <div class="hidden font-bolder transform transition ease-in-out duration-200 mb-5 lg:mb-0 -translate-y-4 lg:-translate-y-0 text-sm md:text-base text-white rounded-full px-3 bg-gradient-to-bl py-1" id="subMsg"></div>
        </div>
        <img src="./assets/imgs/adwaFull.png" class="absolute bottom-0 transform -translate-x-1/2 left-1/2 opacity-70 max-w-sm md:max-w-lg lg:max-w-xl" style="z-index:-3;" alt="">

      </div>

    </section>

  </div>

  <script src="./assets/js/particles.min.js"></script>
  <script src="./assets/js/jquery.min.js"></script>
  <script src="./assets/js/smoothscroll.min.js"></script>
  <script src="./assets/js/aos.min.js"></script>

  <script async src="https://www.googletagmanager.com/gtag/js?id=G-HBP5FBSQTD"></script>
  <script src="./assets/js/mano.js"></script>
  <script>
    const scrRight = document.getElementById('scrLeft');
    const scrLeft = document.getElementById('scrRight');

    scrRight.onclick = function() {
        var rightScroll = document.getElementById('tweets').scrollLeft;
        $('#scrRight path').attr('stroke', 'white');

        document.getElementById('tweets').scrollLeft += 40;
    };
    scrLeft.onclick = function() {
        var leftScroll = document.getElementById('tweets').scrollLeft;
        $('#scrLeft path').attr('stroke', 'white');
        
        if (leftScroll === 0)
        $('#scrRight path').attr('stroke', 'gray');
        else
        $('#scrRight path').attr('stroke', 'white');

        document.getElementById('tweets').scrollLeft -= 40;
    };

    $(document).ready(function(){

      particlesJS('particles-js', {
          "particles": {
              "number": {
              "value": 21,
              "density": {
                  "enable": true,
                  "value_area": 800
              }
              },
              "color": {
              "value": "#c79947"
              },
              "shape": {
              "type": "circle",
              "stroke": {
                  "width": 0,
                  "color": "#000000"
              },
              "polygon": {
                  "nb_sides": 5
              },
              "image": {
                  "src": "img/github.svg",
                  "width": 100,
                  "height": 100
              }
              },
              "opacity": {
              "value": 0.5,
              "random": false,
              "anim": {
                  "enable": false,
                  "speed": 1,
                  "opacity_min": 0.1,
                  "sync": false
              }
              },
              "size": {
              "value": 5,
              "random": true,
              "anim": {
                  "enable": false,
                  "speed": 40,
                  "size_min": 0.1,
                  "sync": false
              }
              },
              "line_linked": {
              "enable": true,
              "distance": 150,
              "color": "#898681",
              "opacity": 0.4,
              "width": 1
              },
              "move": {
              "enable": true,
              "speed": 2,
              "direction": "none",
              "random": false,
              "straight": false,
              "out_mode": "out",
              "attract": {
                  "enable": false,
                  "rotateX": 600,
                  "rotateY": 1200
              }
              }
          },
          "interactivity": {
              "detect_on": "canvas",
              "events": {
              "onhover": {
                  "enable": true,
                  "mode": "grab"
              },
              "onclick": {
                  "enable": true,
                  "mode": "push"
              },
              "resize": true
              },
              "modes": {
              "grab": {
                  "distance": 200,
                  "line_linked": {
                  "opacity": 1
                  }
              },
              "bubble": {
                  "distance": 400,
                  "size": 40,
                  "duration": 2,
                  "opacity": 8,
                  "speed": 3
              },
              "repulse": {
                  "distance": 200
              },
              "push": {
                  "particles_nb": 4
              },
              "remove": {
                  "particles_nb": 2
              }
              }
          },
          "retina_detect": true,
          "config_demo": {
              "hide_card": false,
              "background_color": "#b61924",
              "background_image": "",
              "background_position": "50% 50%",
              "background_repeat": "no-repeat",
              "background_size": "cover"
          }
      });

    });
  </script>

</body>

</html>