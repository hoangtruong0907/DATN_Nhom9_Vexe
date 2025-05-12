@extends('admin.layouts.app')

@section('title', ' Trang Quản trị')
@section('contents')
<div class="animate__animated p-6" :class="[$store.app.animation]">
    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Finance</span>
            </li>
        </ul>
        <div class="pt-5">
            <div class="mb-6 grid grid-cols-1 gap-6 text-white sm:grid-cols-2 xl:grid-cols-4">
                <!-- Users Visit -->
                <div class="panel bg-gradient-to-r from-cyan-500 to-cyan-400">
                    <div class="flex justify-between">
                        <div class="text-md font-semibold ltr:mr-1 rtl:ml-1">Users Visit</div>
                        <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                            <a href="javascript:;" @click="toggle">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70 hover:opacity-80">
                                    <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                    <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                    <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                </svg>
                            </a>
                            <ul x-show="open" x-transition="" x-transition.duration.300ms="" class="text-black ltr:right-0 rtl:left-0 dark:text-white-dark" style="display: none;">
                                <li><a href="javascript:;" @click="toggle">View Report</a></li>
                                <li><a href="javascript:;" @click="toggle">Edit Report</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">$170.46</div>
                        <div class="badge bg-white/30">+ 2.35%</div>
                    </div>
                    <div class="mt-5 flex items-center font-semibold">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                            <path opacity="0.5" d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z" stroke="currentColor" stroke-width="1.5"></path>
                            <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="1.5"></path>
                        </svg>
                        Last Week 44,700
                    </div>
                </div>

                <!-- Sessions -->
                <div class="panel bg-gradient-to-r from-violet-500 to-violet-400">
                    <div class="flex justify-between">
                        <div class="text-md font-semibold ltr:mr-1 rtl:ml-1">Sessions</div>
                        <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                            <a href="javascript:;" @click="toggle">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70 hover:opacity-80">
                                    <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                    <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                    <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                </svg>
                            </a>
                            <ul x-show="open" x-transition="" x-transition.duration.300ms="" class="text-black ltr:right-0 rtl:left-0 dark:text-white-dark" style="display: none;">
                                <li><a href="javascript:;" @click="toggle">View Report</a></li>
                                <li><a href="javascript:;" @click="toggle">Edit Report</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">74,137</div>
                        <div class="badge bg-white/30">- 2.35%</div>
                    </div>
                    <div class="mt-5 flex items-center font-semibold">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                            <path opacity="0.5" d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z" stroke="currentColor" stroke-width="1.5"></path>
                            <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="1.5"></path>
                        </svg>
                        Last Week 84,709
                    </div>
                </div>

                <!-- Time On-Site -->
                <div class="panel bg-gradient-to-r from-blue-500 to-blue-400">
                    <div class="flex justify-between">
                        <div class="text-md font-semibold ltr:mr-1 rtl:ml-1">Time On-Site</div>
                        <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                            <a href="javascript:;" @click="toggle">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70 hover:opacity-80">
                                    <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                    <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                    <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                </svg>
                            </a>
                            <ul x-show="open" x-transition="" x-transition.duration.300ms="" class="text-black ltr:right-0 rtl:left-0 dark:text-white-dark" style="display: none;">
                                <li><a href="javascript:;" @click="toggle">View Report</a></li>
                                <li><a href="javascript:;" @click="toggle">Edit Report</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">38,085</div>
                        <div class="badge bg-white/30">+ 1.35%</div>
                    </div>
                    <div class="mt-5 flex items-center font-semibold">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                            <path opacity="0.5" d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z" stroke="currentColor" stroke-width="1.5"></path>
                            <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="1.5"></path>
                        </svg>
                        Last Week 37,894
                    </div>
                </div>

                <!-- Bounce Rate -->
                <div class="panel bg-gradient-to-r from-fuchsia-500 to-fuchsia-400">
                    <div class="flex justify-between">
                        <div class="text-md font-semibold ltr:mr-1 rtl:ml-1">Bounce Rate</div>
                        <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                            <a href="javascript:;" @click="toggle">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70 hover:opacity-80">
                                    <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                    <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                    <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                </svg>
                            </a>
                            <ul x-show="open" x-transition="" x-transition.duration.300ms="" class="text-black ltr:right-0 rtl:left-0 dark:text-white-dark" style="display: none;">
                                <li><a href="javascript:;" @click="toggle">View Report</a></li>
                                <li><a href="javascript:;" @click="toggle">Edit Report</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">49.10%</div>
                        <div class="badge bg-white/30">- 0.35%</div>
                    </div>
                    <div class="mt-5 flex items-center font-semibold">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                            <path opacity="0.5" d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z" stroke="currentColor" stroke-width="1.5"></path>
                            <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="1.5"></path>
                        </svg>
                        Last Week 50.01%
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">
                <!-- Favorites -->
                <div>
                    <div class="mb-5 flex items-center font-bold">
                        <span class="text-lg">Favorites</span>
                        <a href="javascript:;" class="text-primary hover:text-black ltr:ml-auto rtl:mr-auto dark:hover:text-white-dark">
                            See All
                        </a>
                    </div>
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-3 md:mb-5">
                        <!-- Bitcoin -->
                        <div class="panel">
                            <div class="mb-5 flex items-center font-semibold">
                                <div class="grid h-10 w-10 shrink-0 place-content-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="100%" height="100%" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 4091.27 4091.73" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:xodm="http://www.corel.com/coreldraw/odm/2003">
                                        <g id="Layer_x0020_1">
                                            <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                                            <g id="_1421344023328">
                                                <path fill="#F7931A" fill-rule="nonzero" d="M4030.06 2540.77c-273.24,1096.01 -1383.32,1763.02 -2479.46,1489.71 -1095.68,-273.24 -1762.69,-1383.39 -1489.33,-2479.31 273.12,-1096.13 1383.2,-1763.19 2479,-1489.95 1096.06,273.24 1763.03,1383.51 1489.76,2479.57l0.02 -0.02z"></path>
                                                <path fill="white" fill-rule="nonzero" d="M2947.77 1754.38c40.72,-272.26 -166.56,-418.61 -450,-516.24l91.95 -368.8 -224.5 -55.94 -89.51 359.09c-59.02,-14.72 -119.63,-28.59 -179.87,-42.34l90.16 -361.46 -224.36 -55.94 -92 368.68c-48.84,-11.12 -96.81,-22.11 -143.35,-33.69l0.26 -1.16 -309.59 -77.31 -59.72 239.78c0,0 166.56,38.18 163.05,40.53 90.91,22.69 107.35,82.87 104.62,130.57l-104.74 420.15c6.26,1.59 14.38,3.89 23.34,7.49 -7.49,-1.86 -15.46,-3.89 -23.73,-5.87l-146.81 588.57c-11.11,27.62 -39.31,69.07 -102.87,53.33 2.25,3.26 -163.17,-40.72 -163.17,-40.72l-111.46 256.98 292.15 72.83c54.35,13.63 107.61,27.89 160.06,41.3l-92.9 373.03 224.24 55.94 92 -369.07c61.26,16.63 120.71,31.97 178.91,46.43l-91.69 367.33 224.51 55.94 92.89 -372.33c382.82,72.45 670.67,43.24 791.83,-303.02 97.63,-278.78 -4.86,-439.58 -206.26,-544.44 146.69,-33.83 257.18,-130.31 286.64,-329.61l-0.07 -0.05zm-512.93 719.26c-69.38,278.78 -538.76,128.08 -690.94,90.29l123.28 -494.2c152.17,37.99 640.17,113.17 567.67,403.91zm69.43 -723.3c-63.29,253.58 -453.96,124.75 -580.69,93.16l111.77 -448.21c126.73,31.59 534.85,90.55 468.94,355.05l-0.02 0z"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="ltr:ml-2 rtl:mr-2">
                                    <h6 class="text-dark dark:text-white-light">BTC</h6>
                                    <p class="text-xs text-white-dark">Bitcoin</p>
                                </div>
                            </div>
                            <div class="mb-5 overflow-hidden">
                                <div x-ref="bitcoin" style="min-height: 45px;"><div id="apexchartsz69ulgp9" class="apexcharts-canvas apexchartsz69ulgp9 apexcharts-theme-light" style="width: 122px; height: 45px;"><svg id="SvgjsSvg1006" width="122" height="45" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1008" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1007"><clipPath id="gridRectMaskz69ulgp9"><rect id="SvgjsRect1014" width="128" height="47" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskz69ulgp9"></clipPath><clipPath id="nonForecastMaskz69ulgp9"></clipPath><clipPath id="gridRectMarkerMaskz69ulgp9"><rect id="SvgjsRect1015" width="126" height="49" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><line id="SvgjsLine1013" x1="40.166666666666664" y1="0" x2="40.166666666666664" y2="45" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="40.166666666666664" y="0" width="1" height="45" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1021" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1022" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g></g><g id="SvgjsG1034" class="apexcharts-grid"><g id="SvgjsG1035" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1037" x1="0" y1="0" x2="122" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1038" x1="0" y1="6.428571428571429" x2="122" y2="6.428571428571429" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1039" x1="0" y1="12.857142857142858" x2="122" y2="12.857142857142858" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1040" x1="0" y1="19.285714285714285" x2="122" y2="19.285714285714285" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1041" x1="0" y1="25.714285714285715" x2="122" y2="25.714285714285715" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1042" x1="0" y1="32.142857142857146" x2="122" y2="32.142857142857146" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1043" x1="0" y1="38.57142857142858" x2="122" y2="38.57142857142858" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1044" x1="0" y1="45.00000000000001" x2="122" y2="45.00000000000001" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1036" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1046" x1="0" y1="45" x2="122" y2="45" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1045" x1="0" y1="1" x2="0" y2="45" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1016" class="apexcharts-line-series apexcharts-plot-series"><g id="SvgjsG1017" class="apexcharts-series" seriesName="seriesx1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1020" d="M0 31.5L13.555555555555555 39.214285714285715L27.11111111111111 21.857142857142858L40.666666666666664 37.285714285714285L54.22222222222222 16.714285714285715L67.77777777777779 28.92857142857143L81.33333333333333 7.071428571428569L94.88888888888889 18.642857142857142L108.44444444444444 28.92857142857143L122 2.5714285714285694C122 2.5714285714285694 122 2.5714285714285694 122 2.5714285714285694 " fill="none" fill-opacity="1" stroke="rgba(0,171,85,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-line" index="0" clip-path="url(#gridRectMaskz69ulgp9)" pathTo="M 0 31.5L 13.555555555555555 39.214285714285715L 27.11111111111111 21.857142857142858L 40.666666666666664 37.285714285714285L 54.22222222222222 16.714285714285715L 67.77777777777779 28.92857142857143L 81.33333333333333 7.071428571428569L 94.88888888888889 18.642857142857142L 108.44444444444444 28.92857142857143L 122 2.5714285714285694" pathFrom="M -1 45L -1 45L 13.555555555555555 45L 27.11111111111111 45L 40.666666666666664 45L 54.22222222222222 45L 67.77777777777779 45L 81.33333333333333 45L 94.88888888888889 45L 108.44444444444444 45L 122 45"></path><g id="SvgjsG1018" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1052" r="0" cx="40.666666666666664" cy="37.285714285714285" class="apexcharts-marker wh90vh8b no-pointer-events" stroke="#ffffff" fill="#00ab55" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1019" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1047" x1="0" y1="0" x2="122" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1048" x1="0" y1="0" x2="122" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1049" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1050" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1051" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1012" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1033" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1009" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 22.5px;"></div><div class="apexcharts-tooltip apexcharts-theme-light" style="left: 59.6484px; top: 8px;"><div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 171, 85);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value">12</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                            </div>
                            <div class="flex items-center justify-between text-base font-bold">
                                $20,000 <span class="text-sm font-normal text-success">+0.25%</span>
                            </div>
                        </div>

                        <!-- Ethereum -->
                        <div class="panel">
                            <div class="mb-5 flex items-center font-semibold">
                                <div class="grid h-10 w-10 shrink-0 place-content-center rounded-full bg-warning p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="100%" height="100%" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 784.37 1277.39" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:xodm="http://www.corel.com/coreldraw/odm/2003">
                                        <g id="Layer_x0020_1">
                                            <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                                            <g id="_1421394342400">
                                                <g>
                                                    <polygon fill="#343434" fill-rule="nonzero" points="392.07,0 383.5,29.11 383.5,873.74 392.07,882.29 784.13,650.54 "></polygon>
                                                    <polygon fill="#8C8C8C" fill-rule="nonzero" points="392.07,0 -0,650.54 392.07,882.29 392.07,472.33 "></polygon>
                                                    <polygon fill="#3C3C3B" fill-rule="nonzero" points="392.07,956.52 387.24,962.41 387.24,1263.28 392.07,1277.38 784.37,724.89 "></polygon>
                                                    <polygon fill="#8C8C8C" fill-rule="nonzero" points="392.07,1277.38 392.07,956.52 -0,724.89 "></polygon>
                                                    <polygon fill="#141414" fill-rule="nonzero" points="392.07,882.29 784.13,650.54 392.07,472.33 "></polygon>
                                                    <polygon fill="#393939" fill-rule="nonzero" points="0,650.54 392.07,882.29 392.07,472.33 "></polygon>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="ltr:ml-2 rtl:mr-2">
                                    <h6 class="text-dark dark:text-white-light">ETH</h6>
                                    <p class="text-xs text-white-dark">Ethereum</p>
                                </div>
                            </div>
                            <div class="mb-5 overflow-hidden">
                                <div x-ref="ethereum" style="min-height: 45px;"><div id="apexchartse0pcaify" class="apexcharts-canvas apexchartse0pcaify apexcharts-theme-light" style="width: 122px; height: 45px;"><svg id="SvgjsSvg1053" width="122" height="45" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1055" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1054"><clipPath id="gridRectMaske0pcaify"><rect id="SvgjsRect1061" width="128" height="47" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaske0pcaify"></clipPath><clipPath id="nonForecastMaske0pcaify"></clipPath><clipPath id="gridRectMarkerMaske0pcaify"><rect id="SvgjsRect1062" width="126" height="49" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><line id="SvgjsLine1060" x1="0" y1="0" x2="0" y2="45" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="45" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1068" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1069" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g></g><g id="SvgjsG1081" class="apexcharts-grid"><g id="SvgjsG1082" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1084" x1="0" y1="0" x2="122" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1085" x1="0" y1="6.428571428571429" x2="122" y2="6.428571428571429" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1086" x1="0" y1="12.857142857142858" x2="122" y2="12.857142857142858" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1087" x1="0" y1="19.285714285714285" x2="122" y2="19.285714285714285" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1088" x1="0" y1="25.714285714285715" x2="122" y2="25.714285714285715" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1089" x1="0" y1="32.142857142857146" x2="122" y2="32.142857142857146" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1090" x1="0" y1="38.57142857142858" x2="122" y2="38.57142857142858" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1091" x1="0" y1="45.00000000000001" x2="122" y2="45.00000000000001" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1083" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1093" x1="0" y1="45" x2="122" y2="45" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1092" x1="0" y1="1" x2="0" y2="45" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1063" class="apexcharts-line-series apexcharts-plot-series"><g id="SvgjsG1064" class="apexcharts-series" seriesName="seriesx1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1067" d="M0 16.714285714285715L13.555555555555555 28.92857142857143L27.11111111111111 7.071428571428569L40.666666666666664 18.642857142857142L54.22222222222222 2.5714285714285694L67.77777777777779 28.92857142857143L81.33333333333333 31.5L94.88888888888889 39.214285714285715L108.44444444444444 21.857142857142858L122 37.285714285714285C122 37.285714285714285 122 37.285714285714285 122 37.285714285714285 " fill="none" fill-opacity="1" stroke="rgba(231,81,90,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-line" index="0" clip-path="url(#gridRectMaske0pcaify)" pathTo="M 0 16.714285714285715L 13.555555555555555 28.92857142857143L 27.11111111111111 7.071428571428569L 40.666666666666664 18.642857142857142L 54.22222222222222 2.5714285714285694L 67.77777777777779 28.92857142857143L 81.33333333333333 31.5L 94.88888888888889 39.214285714285715L 108.44444444444444 21.857142857142858L 122 37.285714285714285" pathFrom="M -1 45L -1 45L 13.555555555555555 45L 27.11111111111111 45L 40.666666666666664 45L 54.22222222222222 45L 67.77777777777779 45L 81.33333333333333 45L 94.88888888888889 45L 108.44444444444444 45L 122 45"></path><g id="SvgjsG1065" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1099" r="0" cx="0" cy="0" class="apexcharts-marker wucyr7a44 no-pointer-events" stroke="#ffffff" fill="#e7515a" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1066" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1094" x1="0" y1="0" x2="122" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1095" x1="0" y1="0" x2="122" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1096" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1097" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1098" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1059" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1080" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1056" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 22.5px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(231, 81, 90);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                            </div>
                            <div class="flex items-center justify-between text-base font-bold">
                                $21,000 <span class="text-sm font-normal text-danger">-1.25%</span>
                            </div>
                        </div>

                        <!-- Litecoin -->
                        <div class="panel">
                            <div class="mb-5 flex items-center font-semibold">
                                <div class="grid h-10 w-10 shrink-0 place-content-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0.847 0.876 329.254 329.256">
                                        <title>Litecoin</title>
                                        <path d="M330.102 165.503c0 90.922-73.705 164.629-164.626 164.629C74.554 330.132.848 256.425.848 165.503.848 74.582 74.554.876 165.476.876c90.92 0 164.626 73.706 164.626 164.627" fill="#345d9d"></path>
                                        <path d="M295.15 165.505c0 71.613-58.057 129.675-129.674 129.675-71.616 0-129.677-58.062-129.677-129.675 0-71.619 58.061-129.677 129.677-129.677 71.618 0 129.674 58.057 129.674 129.677" fill="#345d9d"></path>
                                        <path d="M155.854 209.482l10.693-40.264 25.316-9.249 6.297-23.663-.215-.587-24.92 9.104 17.955-67.608h-50.921l-23.481 88.23-19.605 7.162-6.478 24.395 19.59-7.156-13.839 51.998h135.521l8.688-32.362h-84.601" fill="#fff"></path>
                                    </svg>
                                </div>
                                <div class="ltr:ml-2 rtl:mr-2">
                                    <h6 class="text-dark dark:text-white-light">LTC</h6>
                                    <p class="text-xs text-white-dark">Litecoin</p>
                                </div>
                            </div>
                            <div class="mb-5 overflow-hidden">
                                <div x-ref="litecoin" style="min-height: 45px;"><div id="apexchartsw7p7kxru" class="apexcharts-canvas apexchartsw7p7kxru apexcharts-theme-light" style="width: 122px; height: 45px;"><svg id="SvgjsSvg1100" width="122" height="45" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1102" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1101"><clipPath id="gridRectMaskw7p7kxru"><rect id="SvgjsRect1108" width="128" height="47" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskw7p7kxru"></clipPath><clipPath id="nonForecastMaskw7p7kxru"></clipPath><clipPath id="gridRectMarkerMaskw7p7kxru"><rect id="SvgjsRect1109" width="126" height="49" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><line id="SvgjsLine1107" x1="0" y1="0" x2="0" y2="45" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="45" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1115" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1116" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g></g><g id="SvgjsG1128" class="apexcharts-grid"><g id="SvgjsG1129" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1131" x1="0" y1="0" x2="122" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1132" x1="0" y1="6.428571428571429" x2="122" y2="6.428571428571429" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1133" x1="0" y1="12.857142857142858" x2="122" y2="12.857142857142858" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1134" x1="0" y1="19.285714285714285" x2="122" y2="19.285714285714285" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1135" x1="0" y1="25.714285714285715" x2="122" y2="25.714285714285715" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1136" x1="0" y1="32.142857142857146" x2="122" y2="32.142857142857146" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1137" x1="0" y1="38.57142857142858" x2="122" y2="38.57142857142858" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1138" x1="0" y1="45.00000000000001" x2="122" y2="45.00000000000001" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1130" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1140" x1="0" y1="45" x2="122" y2="45" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1139" x1="0" y1="1" x2="0" y2="45" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1110" class="apexcharts-line-series apexcharts-plot-series"><g id="SvgjsG1111" class="apexcharts-series" seriesName="seriesx1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1114" d="M0 39.214285714285715L13.555555555555555 31.5L27.11111111111111 21.857142857142858L40.666666666666664 37.285714285714285L54.22222222222222 2.5714285714285694L67.77777777777779 28.92857142857143L81.33333333333333 16.714285714285715L94.88888888888889 28.92857142857143L108.44444444444444 18.642857142857142L122 7.071428571428569C122 7.071428571428569 122 7.071428571428569 122 7.071428571428569 " fill="none" fill-opacity="1" stroke="rgba(0,171,85,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-line" index="0" clip-path="url(#gridRectMaskw7p7kxru)" pathTo="M 0 39.214285714285715L 13.555555555555555 31.5L 27.11111111111111 21.857142857142858L 40.666666666666664 37.285714285714285L 54.22222222222222 2.5714285714285694L 67.77777777777779 28.92857142857143L 81.33333333333333 16.714285714285715L 94.88888888888889 28.92857142857143L 108.44444444444444 18.642857142857142L 122 7.071428571428569" pathFrom="M -1 45L -1 45L 13.555555555555555 45L 27.11111111111111 45L 40.666666666666664 45L 54.22222222222222 45L 67.77777777777779 45L 81.33333333333333 45L 94.88888888888889 45L 108.44444444444444 45L 122 45"></path><g id="SvgjsG1112" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1146" r="0" cx="0" cy="0" class="apexcharts-marker w093s95x5 no-pointer-events" stroke="#ffffff" fill="#00ab55" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1113" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1141" x1="0" y1="0" x2="122" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1142" x1="0" y1="0" x2="122" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1143" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1144" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1145" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1106" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1127" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1103" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 22.5px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 171, 85);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                            </div>
                            <div class="flex items-center justify-between text-base font-bold">
                                $11,657 <span class="text-sm font-normal text-success">+0.25%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Live Prices -->
                <div>
                    <div class="mb-5 flex items-center font-bold">
                        <span class="text-lg">Live Prices</span>
                        <a href="javascript:;" class="text-primary hover:text-black ltr:ml-auto rtl:mr-auto dark:hover:text-white-dark">
                            See All
                        </a>
                    </div>
                    <div class="mb-6 grid grid-cols-1 gap-6 sm:grid-cols-3">
                        <!-- Binance -->
                        <div class="panel">
                            <div class="mb-5 flex items-center font-semibold">
                                <div class="grid h-10 w-10 shrink-0 place-content-center rounded-full">
                                    <svg width="100%" height="100%" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                        <g id="Icon">
                                            <circle cx="512" cy="512" r="512" style="fill: #f3ba2f"></circle>
                                            <path class="st1 fill-white" d="M404.9 468 512 360.9l107.1 107.2 62.3-62.3L512 236.3 342.6 405.7z"></path>
                                            <path transform="rotate(-45.001 298.629 511.998)" class="st1 fill-white" d="M254.6 467.9h88.1V556h-88.1z"></path>
                                            <path class="st1 fill-white" d="M404.9 556 512 663.1l107.1-107.2 62.4 62.3h-.1L512 787.7 342.6 618.3l-.1-.1z"></path>
                                            <path transform="rotate(-45.001 725.364 512.032)" class="st1 fill-white" d="M681.3 468h88.1v88.1h-88.1z"></path>
                                            <path class="st1 fill-white" d="M575.2 512 512 448.7l-46.7 46.8-5.4 5.3-11.1 11.1-.1.1.1.1 63.2 63.2 63.2-63.3z"></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="ltr:ml-2 rtl:mr-2">
                                    <h6 class="text-dark dark:text-white-light">BNB</h6>
                                    <p class="text-xs text-white-dark">Binance</p>
                                </div>
                            </div>
                            <div class="mb-5 overflow-hidden5">
                                <div x-ref="binance" style="min-height: 45px;"><div id="apexcharts16tmrkwy" class="apexcharts-canvas apexcharts16tmrkwy apexcharts-theme-light" style="width: 122px; height: 45px;"><svg id="SvgjsSvg1147" width="122" height="45" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1149" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1148"><clipPath id="gridRectMask16tmrkwy"><rect id="SvgjsRect1155" width="128" height="47" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMask16tmrkwy"></clipPath><clipPath id="nonForecastMask16tmrkwy"></clipPath><clipPath id="gridRectMarkerMask16tmrkwy"><rect id="SvgjsRect1156" width="126" height="49" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><line id="SvgjsLine1154" x1="0" y1="0" x2="0" y2="45" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="45" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1162" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1163" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g></g><g id="SvgjsG1175" class="apexcharts-grid"><g id="SvgjsG1176" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1178" x1="0" y1="0" x2="122" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1179" x1="0" y1="7.5" x2="122" y2="7.5" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1180" x1="0" y1="15" x2="122" y2="15" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1181" x1="0" y1="22.5" x2="122" y2="22.5" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1182" x1="0" y1="30" x2="122" y2="30" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1183" x1="0" y1="37.5" x2="122" y2="37.5" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1184" x1="0" y1="45" x2="122" y2="45" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1177" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1186" x1="0" y1="45" x2="122" y2="45" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1185" x1="0" y1="1" x2="0" y2="45" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1157" class="apexcharts-line-series apexcharts-plot-series"><g id="SvgjsG1158" class="apexcharts-series" seriesName="seriesx1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1161" d="M0 26.25L13.555555555555555 12L27.11111111111111 26.25L40.666666666666664 0.75L54.22222222222222 14.25L67.77777777777779 29.25L81.33333333333333 18L94.88888888888889 36L108.44444444444444 30.75L122 38.25C122 38.25 122 38.25 122 38.25 " fill="none" fill-opacity="1" stroke="rgba(231,81,90,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-line" index="0" clip-path="url(#gridRectMask16tmrkwy)" pathTo="M 0 26.25L 13.555555555555555 12L 27.11111111111111 26.25L 40.666666666666664 0.75L 54.22222222222222 14.25L 67.77777777777779 29.25L 81.33333333333333 18L 94.88888888888889 36L 108.44444444444444 30.75L 122 38.25" pathFrom="M -1 45L -1 45L 13.555555555555555 45L 27.11111111111111 45L 40.666666666666664 45L 54.22222222222222 45L 67.77777777777779 45L 81.33333333333333 45L 94.88888888888889 45L 108.44444444444444 45L 122 45"></path><g id="SvgjsG1159" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1192" r="0" cx="0" cy="0" class="apexcharts-marker w3vzp7rn6 no-pointer-events" stroke="#ffffff" fill="#e7515a" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1160" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1187" x1="0" y1="0" x2="122" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1188" x1="0" y1="0" x2="122" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1189" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1190" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1191" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1153" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1174" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1150" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 22.5px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(231, 81, 90);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                            </div>
                            <div class="flex items-center justify-between text-base font-bold">
                                $21,000 <span class="text-sm font-normal text-danger">-1.25%</span>
                            </div>
                        </div>

                        <!-- Tether -->
                        <div class="panel">
                            <div class="mb-5 flex items-center font-semibold">
                                <div class="grid h-10 w-10 shrink-0 place-content-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 2000 2000">
                                        <path d="M1000,0c552.26,0,1000,447.74,1000,1000S1552.24,2000,1000,2000,0,1552.38,0,1000,447.68,0,1000,0" fill="#53ae94"></path>
                                        <path d="M1123.42,866.76V718H1463.6V491.34H537.28V718H877.5V866.64C601,879.34,393.1,934.1,393.1,999.7s208,120.36,484.4,133.14v476.5h246V1132.8c276-12.74,483.48-67.46,483.48-133s-207.48-120.26-483.48-133m0,225.64v-0.12c-6.94.44-42.6,2.58-122,2.58-63.48,0-108.14-1.8-123.88-2.62v0.2C633.34,1081.66,451,1039.12,451,988.22S633.36,894.84,877.62,884V1050.1c16,1.1,61.76,3.8,124.92,3.8,75.86,0,114-3.16,121-3.8V884c243.8,10.86,425.72,53.44,425.72,104.16s-182,93.32-425.72,104.18" fill="#fff"></path>
                                    </svg>
                                </div>
                                <div class="ltr:ml-2 rtl:mr-2">
                                    <h6 class="text-dark dark:text-white-light">USDT</h6>
                                    <p class="text-xs text-white-dark">Tether</p>
                                </div>
                            </div>
                            <div class="mb-5 overflow-hidden">
                                <div x-ref="tether" style="min-height: 45px;"><div id="apexcharts7bxrejw6l" class="apexcharts-canvas apexcharts7bxrejw6l apexcharts-theme-light" style="width: 122px; height: 45px;"><svg id="SvgjsSvg1193" width="122" height="45" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1195" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1194"><clipPath id="gridRectMask7bxrejw6l"><rect id="SvgjsRect1201" width="128" height="47" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMask7bxrejw6l"></clipPath><clipPath id="nonForecastMask7bxrejw6l"></clipPath><clipPath id="gridRectMarkerMask7bxrejw6l"><rect id="SvgjsRect1202" width="126" height="49" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><line id="SvgjsLine1200" x1="0" y1="0" x2="0" y2="45" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="45" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1208" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1209" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g></g><g id="SvgjsG1221" class="apexcharts-grid"><g id="SvgjsG1222" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1224" x1="0" y1="0" x2="122" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1225" x1="0" y1="6.428571428571429" x2="122" y2="6.428571428571429" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1226" x1="0" y1="12.857142857142858" x2="122" y2="12.857142857142858" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1227" x1="0" y1="19.285714285714285" x2="122" y2="19.285714285714285" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1228" x1="0" y1="25.714285714285715" x2="122" y2="25.714285714285715" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1229" x1="0" y1="32.142857142857146" x2="122" y2="32.142857142857146" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1230" x1="0" y1="38.57142857142858" x2="122" y2="38.57142857142858" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1231" x1="0" y1="45.00000000000001" x2="122" y2="45.00000000000001" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1223" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1233" x1="0" y1="45" x2="122" y2="45" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1232" x1="0" y1="1" x2="0" y2="45" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1203" class="apexcharts-line-series apexcharts-plot-series"><g id="SvgjsG1204" class="apexcharts-series" seriesName="seriesx1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1207" d="M0 31.5L13.555555555555555 7.071428571428569L27.11111111111111 18.642857142857142L40.666666666666664 16.714285714285715L54.22222222222222 28.92857142857143L67.77777777777779 2.5714285714285694L81.33333333333333 39.214285714285715L94.88888888888889 21.857142857142858L108.44444444444444 28.92857142857143L122 37.285714285714285C122 37.285714285714285 122 37.285714285714285 122 37.285714285714285 " fill="none" fill-opacity="1" stroke="rgba(0,171,85,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-line" index="0" clip-path="url(#gridRectMask7bxrejw6l)" pathTo="M 0 31.5L 13.555555555555555 7.071428571428569L 27.11111111111111 18.642857142857142L 40.666666666666664 16.714285714285715L 54.22222222222222 28.92857142857143L 67.77777777777779 2.5714285714285694L 81.33333333333333 39.214285714285715L 94.88888888888889 21.857142857142858L 108.44444444444444 28.92857142857143L 122 37.285714285714285" pathFrom="M -1 45L -1 45L 13.555555555555555 45L 27.11111111111111 45L 40.666666666666664 45L 54.22222222222222 45L 67.77777777777779 45L 81.33333333333333 45L 94.88888888888889 45L 108.44444444444444 45L 122 45"></path><g id="SvgjsG1205" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1239" r="0" cx="0" cy="0" class="apexcharts-marker wx6nxjxdfk no-pointer-events" stroke="#ffffff" fill="#00ab55" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1206" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1234" x1="0" y1="0" x2="122" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1235" x1="0" y1="0" x2="122" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1236" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1237" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1238" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1199" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1220" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1196" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 22.5px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 171, 85);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                            </div>
                            <div class="flex items-center justify-between text-base font-bold">
                                $20,000 <span class="text-sm font-normal text-success">+0.25%</span>
                            </div>
                        </div>

                        <!-- Solana -->
                        <div class="panel">
                            <div class="mb-5 flex items-center font-semibold">
                                <div class="grid h-10 w-10 shrink-0 place-content-center rounded-full bg-warning p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 508.07 398.17">
                                        <defs>
                                            <linearGradient id="linear-gradient" x1="463" y1="205.16" x2="182.39" y2="742.62" gradientTransform="translate(0 -198)" gradientUnits="userSpaceOnUse">
                                                <stop offset="0" stop-color="#00ffa3"></stop>
                                                <stop offset="1" stop-color="#dc1fff"></stop>
                                            </linearGradient>
                                            <linearGradient id="linear-gradient-2" x1="340.31" y1="141.1" x2="59.71" y2="678.57" xlink:href="#linear-gradient"></linearGradient>
                                            <linearGradient id="linear-gradient-3" x1="401.26" y1="172.92" x2="120.66" y2="710.39" xlink:href="#linear-gradient"></linearGradient>
                                        </defs>
                                        <path class="cls-1 fill-[url(#linear-gradient)]" d="M84.53,358.89A16.63,16.63,0,0,1,96.28,354H501.73a8.3,8.3,0,0,1,5.87,14.18l-80.09,80.09a16.61,16.61,0,0,1-11.75,4.86H10.31A8.31,8.31,0,0,1,4.43,439Z" transform="translate(-1.98 -55)"></path>
                                        <path class="cls-2 fill-[url(#linear-gradient)]" d="M84.53,59.85A17.08,17.08,0,0,1,96.28,55H501.73a8.3,8.3,0,0,1,5.87,14.18l-80.09,80.09a16.61,16.61,0,0,1-11.75,4.86H10.31A8.31,8.31,0,0,1,4.43,140Z" transform="translate(-1.98 -55)"></path>
                                        <path class="cls-3 fill-[url(#linear-gradient)]" d="M427.51,208.42a16.61,16.61,0,0,0-11.75-4.86H10.31a8.31,8.31,0,0,0-5.88,14.18l80.1,80.09a16.6,16.6,0,0,0,11.75,4.86H501.73a8.3,8.3,0,0,0,5.87-14.18Z" transform="translate(-1.98 -55)"></path>
                                    </svg>
                                </div>
                                <div class="ltr:ml-2 rtl:mr-2">
                                    <h6 class="text-dark dark:text-white-light">SOL</h6>
                                    <p class="text-xs text-white-dark">Solana</p>
                                </div>
                            </div>
                            <div class="mb-5 overflow-hidden">
                                <div x-ref="solana" style="min-height: 45px;"><div id="apexchartsl3pbot1f" class="apexcharts-canvas apexchartsl3pbot1f apexcharts-theme-light" style="width: 122px; height: 45px;"><svg id="SvgjsSvg1240" width="122" height="45" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1242" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1241"><clipPath id="gridRectMaskl3pbot1f"><rect id="SvgjsRect1248" width="128" height="47" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskl3pbot1f"></clipPath><clipPath id="nonForecastMaskl3pbot1f"></clipPath><clipPath id="gridRectMarkerMaskl3pbot1f"><rect id="SvgjsRect1249" width="126" height="49" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><line id="SvgjsLine1247" x1="0" y1="0" x2="0" y2="45" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="45" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1255" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1256" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g></g><g id="SvgjsG1268" class="apexcharts-grid"><g id="SvgjsG1269" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1271" x1="0" y1="0" x2="122" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1272" x1="0" y1="9" x2="122" y2="9" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1273" x1="0" y1="18" x2="122" y2="18" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1274" x1="0" y1="27" x2="122" y2="27" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1275" x1="0" y1="36" x2="122" y2="36" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1276" x1="0" y1="45" x2="122" y2="45" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1270" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1278" x1="0" y1="45" x2="122" y2="45" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1277" x1="0" y1="1" x2="0" y2="45" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1250" class="apexcharts-line-series apexcharts-plot-series"><g id="SvgjsG1251" class="apexcharts-series" seriesName="seriesx1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1254" d="M0 20.7L13.555555555555555 29.7L27.11111111111111 16.200000000000003L40.666666666666664 30.6L54.22222222222222 13.8L67.77777777777779 19.5L81.33333333333333 9.3L94.88888888888889 39.3L108.44444444444444 7.199999999999999L122 34.5C122 34.5 122 34.5 122 34.5 " fill="none" fill-opacity="1" stroke="rgba(231,81,90,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-line" index="0" clip-path="url(#gridRectMaskl3pbot1f)" pathTo="M 0 20.7L 13.555555555555555 29.7L 27.11111111111111 16.200000000000003L 40.666666666666664 30.6L 54.22222222222222 13.8L 67.77777777777779 19.5L 81.33333333333333 9.3L 94.88888888888889 39.3L 108.44444444444444 7.199999999999999L 122 34.5" pathFrom="M -1 27L -1 27L 13.555555555555555 27L 27.11111111111111 27L 40.666666666666664 27L 54.22222222222222 27L 67.77777777777779 27L 81.33333333333333 27L 94.88888888888889 27L 108.44444444444444 27L 122 27"></path><g id="SvgjsG1252" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1284" r="0" cx="0" cy="0" class="apexcharts-marker wzyg2p074 no-pointer-events" stroke="#ffffff" fill="#e7515a" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1253" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1279" x1="0" y1="0" x2="122" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1280" x1="0" y1="0" x2="122" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1281" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1282" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1283" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1246" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1267" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1243" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 22.5px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(231, 81, 90);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                            </div>
                            <div class="flex items-center justify-between text-base font-bold">
                                $21,000 <span class="text-sm font-normal text-danger">-1.25%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">
                <div class="grid gap-6 xl:grid-flow-row">
                    <!-- Previous Statement -->
                    <div class="panel overflow-hidden">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-lg font-bold">Previous Statement</div>
                                <div class="text-success">Paid on June 27, 2022</div>
                            </div>
                            <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                <a href="javascript:;" @click="toggle">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70 hover:opacity-80">
                                        <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                        <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                        <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                    </svg>
                                </a>
                                <ul x-show="open" x-transition="" x-transition.duration.300ms="" class="ltr:right-0 rtl:left-0" style="display: none;">
                                    <li><a href="javascript:;" @click="toggle">View Report</a></li>
                                    <li><a href="javascript:;" @click="toggle">Edit Report</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="relative mt-10">
                            <div class="absolute -bottom-12 h-24 w-24 ltr:-right-12 rtl:-left-12">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-full w-full text-success opacity-20">
                                    <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"></circle>
                                    <path d="M8.5 12.5L10.5 14.5L15.5 9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <div class="grid grid-cols-2 gap-6 md:grid-cols-3">
                                <div>
                                    <div class="text-primary">Card Limit</div>
                                    <div class="mt-2 text-2xl font-semibold">$50,000.00</div>
                                </div>
                                <div>
                                    <div class="text-primary">Spent</div>
                                    <div class="mt-2 text-2xl font-semibold">$15,000.00</div>
                                </div>
                                <div>
                                    <div class="text-primary">Minimum</div>
                                    <div class="mt-2 text-2xl font-semibold">$2,500.00</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Current Statement -->
                    <div class="panel overflow-hidden">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-lg font-bold">Current Statement</div>
                                <div class="text-danger">Must be paid before July 27, 2022</div>
                            </div>
                            <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                <a href="javascript:;" @click="toggle">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70 hover:opacity-80">
                                        <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                        <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                        <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                    </svg>
                                </a>
                                <ul x-show="open" x-transition="" x-transition.duration.300ms="" class="ltr:right-0 rtl:left-0" style="display: none;">
                                    <li><a href="javascript:;" @click="toggle">View Report</a></li>
                                    <li><a href="javascript:;" @click="toggle">Edit Report</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="relative mt-10">
                            <div class="absolute -bottom-12 h-24 w-24 ltr:-right-12 rtl:-left-12">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-full w-24 text-danger opacity-20">
                                    <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"></circle>
                                    <path d="M12 7V13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <circle cx="12" cy="16" r="1" fill="currentColor"></circle>
                                </svg>
                            </div>

                            <div class="grid grid-cols-2 gap-6 md:grid-cols-3">
                                <div>
                                    <div class="text-primary">Card Limit</div>
                                    <div class="mt-2 text-2xl font-semibold">$50,000.00</div>
                                </div>
                                <div>
                                    <div class="text-primary">Spent</div>
                                    <div class="mt-2 text-2xl font-semibold">$30,500.00</div>
                                </div>
                                <div>
                                    <div class="text-primary">Minimum</div>
                                    <div class="mt-2 text-2xl font-semibold">$8,000.00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Transactions -->
                <div class="panel">
                    <div class="mb-5 text-lg font-bold">Recent Transactions</div>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="ltr:rounded-l-md rtl:rounded-r-md">ID</th>
                                    <th>DATE</th>
                                    <th>NAME</th>
                                    <th>AMOUNT</th>
                                    <th class="text-center ltr:rounded-r-md rtl:rounded-l-md">STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="font-semibold">#01</td>
                                    <td class="whitespace-nowrap">Oct 08, 2021</td>
                                    <td class="whitespace-nowrap">Eric Page</td>
                                    <td>$1,358.75</td>
                                    <td class="text-center">
                                        <span class="badge rounded-full bg-success/20 text-success hover:top-0">Completed</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-semibold">#02</td>
                                    <td class="whitespace-nowrap">Dec 18, 2021</td>
                                    <td class="whitespace-nowrap">Nita Parr</td>
                                    <td>-$1,042.82</td>
                                    <td class="text-center">
                                        <span class="badge rounded-full bg-info/20 text-info hover:top-0">In Process</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-semibold">#03</td>
                                    <td class="whitespace-nowrap">Dec 25, 2021</td>
                                    <td class="whitespace-nowrap">Carl Bell</td>
                                    <td>$1,828.16</td>
                                    <td class="text-center">
                                        <span class="badge rounded-full bg-danger/20 text-danger hover:top-0">Pending</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-semibold">#04</td>
                                    <td class="whitespace-nowrap">Nov 29, 2021</td>
                                    <td class="whitespace-nowrap">Dan Hart</td>
                                    <td>$1,647.55</td>
                                    <td class="text-center">
                                        <span class="badge rounded-full bg-success/20 text-success hover:top-0">Completed</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-semibold">#05</td>
                                    <td class="whitespace-nowrap">Nov 24, 2021</td>
                                    <td class="whitespace-nowrap">Jake Ross</td>
                                    <td>$927.43</td>
                                    <td class="text-center">
                                        <span class="badge rounded-full bg-success/20 text-success hover:top-0">Completed</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-semibold">#06</td>
                                    <td class="whitespace-nowrap">Jan 26, 2022</td>
                                    <td class="whitespace-nowrap">Anna Bell</td>
                                    <td>$250.00</td>
                                    <td class="text-center">
                                        <span class="badge rounded-full bg-info/20 text-info hover:top-0">In Process</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection
