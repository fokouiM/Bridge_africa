@extends('layouts.app_admin')

@section('content_admin')
    <div class="main d-flex flex-column flex-row-fluid">
        <div class="content flex-column-fluid" id="kt_content">
            <div class="row">
                <div class="col-xl-4">
                    <!--begin::Mixed Widget 4-->
                    <div class="card card-custom bg-radial-gradient-danger gutter-b card-stretch">
                        <!--begin::Header-->
                        <div class="card-header border-0 py-5">
                            <h3 class="card-title font-weight-bolder text-white">Sales Progress</h3>
                            <div class="card-toolbar">
                                <div class="dropdown dropdown-inline">
                                    <a href="#" class="btn btn-text-white btn-hover-white btn-sm btn-icon border-0"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ki ki-bold-more-hor"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="">
                                        <!--begin::Navigation-->
                                        <ul class="navi navi-hover">
                                            <li class="navi-header pb-1">
                                                <span class="text-primary text-uppercase font-weight-bold font-size-sm">Add
                                                    new:</span>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon"><i class="flaticon2-shopping-cart-1"></i></span>
                                                    <span class="navi-text">Order</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon"><i class="flaticon2-calendar-8"></i></span>
                                                    <span class="navi-text">Event</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon"><i class="flaticon2-graph-1"></i></span>
                                                    <span class="navi-text">Report</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon"><i class="flaticon2-rocket-1"></i></span>
                                                    <span class="navi-text">Post</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon"><i class="flaticon2-writing"></i></span>
                                                    <span class="navi-text">File</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <!--end::Navigation-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column p-0" style="position: relative;">
                            <!--begin::Chart-->
                            <div id="kt_mixed_widget_6_chart" style="height: 200px; min-height: 200px;">
                                <div id="apexcharts99rhn4ce" class="apexcharts-canvas apexcharts99rhn4ce apexcharts-theme-light"
                                    style="width: 830px; height: 200px;"><svg id="SvgjsSvg1540" width="830" height="200"
                                        xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                        class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                        style="background: transparent;">
                                        <g id="SvgjsG1542" class="apexcharts-inner apexcharts-graphical"
                                            transform="translate(20, 0)">
                                            <defs id="SvgjsDefs1541">
                                                <linearGradient id="SvgjsLinearGradient1545" x1="0" y1="0" x2="0" y2="1">
                                                    <stop id="SvgjsStop1546" stop-opacity="0.4"
                                                        stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                                    <stop id="SvgjsStop1547" stop-opacity="0.5"
                                                        stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                    <stop id="SvgjsStop1548" stop-opacity="0.5"
                                                        stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                </linearGradient>
                                                <clipPath id="gridRectMask99rhn4ce">
                                                    <rect id="SvgjsRect1550" width="795" height="201" x="-2.5" y="-0.5" rx="0"
                                                        ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="#fff"></rect>
                                                </clipPath>
                                                <clipPath id="gridRectMarkerMask99rhn4ce">
                                                    <rect id="SvgjsRect1551" width="794" height="204" x="-2" y="-2" rx="0"
                                                        ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="#fff"></rect>
                                                </clipPath>
                                            </defs>
                                            <rect id="SvgjsRect1549" width="16.92857142857143" height="200" x="0" y="0" rx="0"
                                                ry="0" opacity="1" stroke-width="0" stroke-dasharray="3"
                                                fill="url(#SvgjsLinearGradient1545)" class="apexcharts-xcrosshairs" y2="200"
                                                filter="none" fill-opacity="0.9"></rect>
                                            <g id="SvgjsG1571" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                <g id="SvgjsG1572" class="apexcharts-xaxis-texts-g"
                                                    transform="translate(0, -4)"></g>
                                            </g>
                                            <g id="SvgjsG1574" class="apexcharts-grid">
                                                <g id="SvgjsG1575" class="apexcharts-gridlines-horizontal"
                                                    style="display: none;">
                                                    <line id="SvgjsLine1577" x1="0" y1="0" x2="790" y2="0" stroke="#ecf0f3"
                                                        stroke-dasharray="4" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1578" x1="0" y1="20" x2="790" y2="20" stroke="#ecf0f3"
                                                        stroke-dasharray="4" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1579" x1="0" y1="40" x2="790" y2="40" stroke="#ecf0f3"
                                                        stroke-dasharray="4" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1580" x1="0" y1="60" x2="790" y2="60" stroke="#ecf0f3"
                                                        stroke-dasharray="4" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1581" x1="0" y1="80" x2="790" y2="80" stroke="#ecf0f3"
                                                        stroke-dasharray="4" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1582" x1="0" y1="100" x2="790" y2="100" stroke="#ecf0f3"
                                                        stroke-dasharray="4" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1583" x1="0" y1="120" x2="790" y2="120" stroke="#ecf0f3"
                                                        stroke-dasharray="4" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1584" x1="0" y1="140" x2="790" y2="140" stroke="#ecf0f3"
                                                        stroke-dasharray="4" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1585" x1="0" y1="160" x2="790" y2="160" stroke="#ecf0f3"
                                                        stroke-dasharray="4" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1586" x1="0" y1="180" x2="790" y2="180" stroke="#ecf0f3"
                                                        stroke-dasharray="4" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1587" x1="0" y1="200" x2="790" y2="200" stroke="#ecf0f3"
                                                        stroke-dasharray="4" class="apexcharts-gridline"></line>
                                                </g>
                                                <g id="SvgjsG1576" class="apexcharts-gridlines-vertical" style="display: none;">
                                                </g>
                                                <line id="SvgjsLine1589" x1="0" y1="200" x2="790" y2="200" stroke="transparent"
                                                    stroke-dasharray="0"></line>
                                                <line id="SvgjsLine1588" x1="0" y1="1" x2="0" y2="200" stroke="transparent"
                                                    stroke-dasharray="0"></line>
                                            </g>
                                            <g id="SvgjsG1552" class="apexcharts-bar-series apexcharts-plot-series">
                                                <g id="SvgjsG1553" class="apexcharts-series" rel="1" seriesName="NetxProfit"
                                                    data:realIndex="0">
                                                    <path id="SvgjsPath1555"
                                                        d="M 39.5 200L 39.5 133.73214285714286Q 47.464285714285715 126.26785714285714 55.42857142857143 133.73214285714286L 55.42857142857143 133.73214285714286L 55.42857142857143 200L 55.42857142857143 200z"
                                                        fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent"
                                                        stroke-opacity="1" stroke-linecap="square" stroke-width="1"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMask99rhn4ce)"
                                                        pathTo="M 39.5 200L 39.5 133.73214285714286Q 47.464285714285715 126.26785714285714 55.42857142857143 133.73214285714286L 55.42857142857143 133.73214285714286L 55.42857142857143 200L 55.42857142857143 200z"
                                                        pathFrom="M 39.5 200L 39.5 200L 55.42857142857143 200L 55.42857142857143 200L 55.42857142857143 200L 39.5 200"
                                                        cy="130" cx="151.85714285714286" j="0" val="35" barHeight="70"
                                                        barWidth="16.92857142857143"></path>
                                                    <path id="SvgjsPath1556"
                                                        d="M 152.35714285714286 200L 152.35714285714286 73.73214285714286Q 160.32142857142858 66.26785714285714 168.28571428571428 73.73214285714286L 168.28571428571428 73.73214285714286L 168.28571428571428 200L 168.28571428571428 200z"
                                                        fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent"
                                                        stroke-opacity="1" stroke-linecap="square" stroke-width="1"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMask99rhn4ce)"
                                                        pathTo="M 152.35714285714286 200L 152.35714285714286 73.73214285714286Q 160.32142857142858 66.26785714285714 168.28571428571428 73.73214285714286L 168.28571428571428 73.73214285714286L 168.28571428571428 200L 168.28571428571428 200z"
                                                        pathFrom="M 152.35714285714286 200L 152.35714285714286 200L 168.28571428571428 200L 168.28571428571428 200L 168.28571428571428 200L 152.35714285714286 200"
                                                        cy="70" cx="264.7142857142857" j="1" val="65" barHeight="130"
                                                        barWidth="16.92857142857143"></path>
                                                    <path id="SvgjsPath1557"
                                                        d="M 265.2142857142857 200L 265.2142857142857 53.73214285714286Q 273.17857142857144 46.267857142857146 281.14285714285717 53.73214285714286L 281.14285714285717 53.73214285714286L 281.14285714285717 200L 281.14285714285717 200z"
                                                        fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent"
                                                        stroke-opacity="1" stroke-linecap="square" stroke-width="1"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMask99rhn4ce)"
                                                        pathTo="M 265.2142857142857 200L 265.2142857142857 53.73214285714286Q 273.17857142857144 46.267857142857146 281.14285714285717 53.73214285714286L 281.14285714285717 53.73214285714286L 281.14285714285717 200L 281.14285714285717 200z"
                                                        pathFrom="M 265.2142857142857 200L 265.2142857142857 200L 281.14285714285717 200L 281.14285714285717 200L 281.14285714285717 200L 265.2142857142857 200"
                                                        cy="50" cx="377.57142857142856" j="2" val="75" barHeight="150"
                                                        barWidth="16.92857142857143"></path>
                                                    <path id="SvgjsPath1558"
                                                        d="M 378.07142857142856 200L 378.07142857142856 93.73214285714286Q 386.0357142857143 86.26785714285714 394 93.73214285714286L 394 93.73214285714286L 394 200L 394 200z"
                                                        fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent"
                                                        stroke-opacity="1" stroke-linecap="square" stroke-width="1"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMask99rhn4ce)"
                                                        pathTo="M 378.07142857142856 200L 378.07142857142856 93.73214285714286Q 386.0357142857143 86.26785714285714 394 93.73214285714286L 394 93.73214285714286L 394 200L 394 200z"
                                                        pathFrom="M 378.07142857142856 200L 378.07142857142856 200L 394 200L 394 200L 394 200L 378.07142857142856 200"
                                                        cy="90" cx="490.42857142857144" j="3" val="55" barHeight="110"
                                                        barWidth="16.92857142857143"></path>
                                                    <path id="SvgjsPath1559"
                                                        d="M 490.92857142857144 200L 490.92857142857144 113.73214285714286Q 498.89285714285717 106.26785714285714 506.8571428571429 113.73214285714286L 506.8571428571429 113.73214285714286L 506.8571428571429 200L 506.8571428571429 200z"
                                                        fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent"
                                                        stroke-opacity="1" stroke-linecap="square" stroke-width="1"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMask99rhn4ce)"
                                                        pathTo="M 490.92857142857144 200L 490.92857142857144 113.73214285714286Q 498.89285714285717 106.26785714285714 506.8571428571429 113.73214285714286L 506.8571428571429 113.73214285714286L 506.8571428571429 200L 506.8571428571429 200z"
                                                        pathFrom="M 490.92857142857144 200L 490.92857142857144 200L 506.8571428571429 200L 506.8571428571429 200L 506.8571428571429 200L 490.92857142857144 200"
                                                        cy="110" cx="603.2857142857143" j="4" val="45" barHeight="90"
                                                        barWidth="16.92857142857143"></path>
                                                    <path id="SvgjsPath1560"
                                                        d="M 603.7857142857143 200L 603.7857142857143 83.73214285714286Q 611.75 76.26785714285714 619.7142857142858 83.73214285714286L 619.7142857142858 83.73214285714286L 619.7142857142858 200L 619.7142857142858 200z"
                                                        fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent"
                                                        stroke-opacity="1" stroke-linecap="square" stroke-width="1"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMask99rhn4ce)"
                                                        pathTo="M 603.7857142857143 200L 603.7857142857143 83.73214285714286Q 611.75 76.26785714285714 619.7142857142858 83.73214285714286L 619.7142857142858 83.73214285714286L 619.7142857142858 200L 619.7142857142858 200z"
                                                        pathFrom="M 603.7857142857143 200L 603.7857142857143 200L 619.7142857142858 200L 619.7142857142858 200L 619.7142857142858 200L 603.7857142857143 200"
                                                        cy="80" cx="716.1428571428572" j="5" val="60" barHeight="120"
                                                        barWidth="16.92857142857143"></path>
                                                    <path id="SvgjsPath1561"
                                                        d="M 716.6428571428572 200L 716.6428571428572 93.73214285714286Q 724.6071428571429 86.26785714285714 732.5714285714287 93.73214285714286L 732.5714285714287 93.73214285714286L 732.5714285714287 200L 732.5714285714287 200z"
                                                        fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent"
                                                        stroke-opacity="1" stroke-linecap="square" stroke-width="1"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMask99rhn4ce)"
                                                        pathTo="M 716.6428571428572 200L 716.6428571428572 93.73214285714286Q 724.6071428571429 86.26785714285714 732.5714285714287 93.73214285714286L 732.5714285714287 93.73214285714286L 732.5714285714287 200L 732.5714285714287 200z"
                                                        pathFrom="M 716.6428571428572 200L 716.6428571428572 200L 732.5714285714287 200L 732.5714285714287 200L 732.5714285714287 200L 716.6428571428572 200"
                                                        cy="90" cx="829.0000000000001" j="6" val="55" barHeight="110"
                                                        barWidth="16.92857142857143"></path>
                                                </g>
                                                <g id="SvgjsG1562" class="apexcharts-series" rel="2" seriesName="Revenue"
                                                    data:realIndex="1">
                                                    <path id="SvgjsPath1564"
                                                        d="M 56.42857142857143 200L 56.42857142857143 123.73214285714286Q 64.39285714285714 116.26785714285714 72.35714285714286 123.73214285714286L 72.35714285714286 123.73214285714286L 72.35714285714286 200L 72.35714285714286 200z"
                                                        fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent"
                                                        stroke-opacity="1" stroke-linecap="square" stroke-width="1"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMask99rhn4ce)"
                                                        pathTo="M 56.42857142857143 200L 56.42857142857143 123.73214285714286Q 64.39285714285714 116.26785714285714 72.35714285714286 123.73214285714286L 72.35714285714286 123.73214285714286L 72.35714285714286 200L 72.35714285714286 200z"
                                                        pathFrom="M 56.42857142857143 200L 56.42857142857143 200L 72.35714285714286 200L 72.35714285714286 200L 72.35714285714286 200L 56.42857142857143 200"
                                                        cy="120" cx="168.78571428571428" j="0" val="40" barHeight="80"
                                                        barWidth="16.92857142857143"></path>
                                                    <path id="SvgjsPath1565"
                                                        d="M 169.28571428571428 200L 169.28571428571428 63.73214285714286Q 177.25 56.267857142857146 185.21428571428572 63.73214285714286L 185.21428571428572 63.73214285714286L 185.21428571428572 200L 185.21428571428572 200z"
                                                        fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent"
                                                        stroke-opacity="1" stroke-linecap="square" stroke-width="1"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMask99rhn4ce)"
                                                        pathTo="M 169.28571428571428 200L 169.28571428571428 63.73214285714286Q 177.25 56.267857142857146 185.21428571428572 63.73214285714286L 185.21428571428572 63.73214285714286L 185.21428571428572 200L 185.21428571428572 200z"
                                                        pathFrom="M 169.28571428571428 200L 169.28571428571428 200L 185.21428571428572 200L 185.21428571428572 200L 185.21428571428572 200L 169.28571428571428 200"
                                                        cy="60" cx="281.64285714285717" j="1" val="70" barHeight="140"
                                                        barWidth="16.92857142857143"></path>
                                                    <path id="SvgjsPath1566"
                                                        d="M 282.14285714285717 200L 282.14285714285717 43.73214285714286Q 290.1071428571429 36.267857142857146 298.0714285714286 43.73214285714286L 298.0714285714286 43.73214285714286L 298.0714285714286 200L 298.0714285714286 200z"
                                                        fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent"
                                                        stroke-opacity="1" stroke-linecap="square" stroke-width="1"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMask99rhn4ce)"
                                                        pathTo="M 282.14285714285717 200L 282.14285714285717 43.73214285714286Q 290.1071428571429 36.267857142857146 298.0714285714286 43.73214285714286L 298.0714285714286 43.73214285714286L 298.0714285714286 200L 298.0714285714286 200z"
                                                        pathFrom="M 282.14285714285717 200L 282.14285714285717 200L 298.0714285714286 200L 298.0714285714286 200L 298.0714285714286 200L 282.14285714285717 200"
                                                        cy="40" cx="394.5" j="2" val="80" barHeight="160"
                                                        barWidth="16.92857142857143"></path>
                                                    <path id="SvgjsPath1567"
                                                        d="M 395 200L 395 83.73214285714286Q 402.9642857142857 76.26785714285714 410.92857142857144 83.73214285714286L 410.92857142857144 83.73214285714286L 410.92857142857144 200L 410.92857142857144 200z"
                                                        fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent"
                                                        stroke-opacity="1" stroke-linecap="square" stroke-width="1"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMask99rhn4ce)"
                                                        pathTo="M 395 200L 395 83.73214285714286Q 402.9642857142857 76.26785714285714 410.92857142857144 83.73214285714286L 410.92857142857144 83.73214285714286L 410.92857142857144 200L 410.92857142857144 200z"
                                                        pathFrom="M 395 200L 395 200L 410.92857142857144 200L 410.92857142857144 200L 410.92857142857144 200L 395 200"
                                                        cy="80" cx="507.3571428571429" j="3" val="60" barHeight="120"
                                                        barWidth="16.92857142857143"></path>
                                                    <path id="SvgjsPath1568"
                                                        d="M 507.8571428571429 200L 507.8571428571429 103.73214285714286Q 515.8214285714286 96.26785714285714 523.7857142857143 103.73214285714286L 523.7857142857143 103.73214285714286L 523.7857142857143 200L 523.7857142857143 200z"
                                                        fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent"
                                                        stroke-opacity="1" stroke-linecap="square" stroke-width="1"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMask99rhn4ce)"
                                                        pathTo="M 507.8571428571429 200L 507.8571428571429 103.73214285714286Q 515.8214285714286 96.26785714285714 523.7857142857143 103.73214285714286L 523.7857142857143 103.73214285714286L 523.7857142857143 200L 523.7857142857143 200z"
                                                        pathFrom="M 507.8571428571429 200L 507.8571428571429 200L 523.7857142857143 200L 523.7857142857143 200L 523.7857142857143 200L 507.8571428571429 200"
                                                        cy="100" cx="620.2142857142858" j="4" val="50" barHeight="100"
                                                        barWidth="16.92857142857143"></path>
                                                    <path id="SvgjsPath1569"
                                                        d="M 620.7142857142858 200L 620.7142857142858 73.73214285714286Q 628.6785714285714 66.26785714285714 636.6428571428572 73.73214285714286L 636.6428571428572 73.73214285714286L 636.6428571428572 200L 636.6428571428572 200z"
                                                        fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent"
                                                        stroke-opacity="1" stroke-linecap="square" stroke-width="1"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMask99rhn4ce)"
                                                        pathTo="M 620.7142857142858 200L 620.7142857142858 73.73214285714286Q 628.6785714285714 66.26785714285714 636.6428571428572 73.73214285714286L 636.6428571428572 73.73214285714286L 636.6428571428572 200L 636.6428571428572 200z"
                                                        pathFrom="M 620.7142857142858 200L 620.7142857142858 200L 636.6428571428572 200L 636.6428571428572 200L 636.6428571428572 200L 620.7142857142858 200"
                                                        cy="70" cx="733.0714285714287" j="5" val="65" barHeight="130"
                                                        barWidth="16.92857142857143"></path>
                                                    <path id="SvgjsPath1570"
                                                        d="M 733.5714285714287 200L 733.5714285714287 83.73214285714286Q 741.5357142857143 76.26785714285714 749.5000000000001 83.73214285714286L 749.5000000000001 83.73214285714286L 749.5000000000001 200L 749.5000000000001 200z"
                                                        fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent"
                                                        stroke-opacity="1" stroke-linecap="square" stroke-width="1"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMask99rhn4ce)"
                                                        pathTo="M 733.5714285714287 200L 733.5714285714287 83.73214285714286Q 741.5357142857143 76.26785714285714 749.5000000000001 83.73214285714286L 749.5000000000001 83.73214285714286L 749.5000000000001 200L 749.5000000000001 200z"
                                                        pathFrom="M 733.5714285714287 200L 733.5714285714287 200L 749.5000000000001 200L 749.5000000000001 200L 749.5000000000001 200L 733.5714285714287 200"
                                                        cy="80" cx="845.9285714285716" j="6" val="60" barHeight="120"
                                                        barWidth="16.92857142857143"></path>
                                                    <g id="SvgjsG1563" class="apexcharts-datalabels" data:realIndex="1"></g>
                                                </g>
                                                <g id="SvgjsG1554" class="apexcharts-datalabels" data:realIndex="0"></g>
                                            </g>
                                            <line id="SvgjsLine1590" x1="0" y1="0" x2="790" y2="0" stroke="#b6b6b6"
                                                stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine1591" x1="0" y1="0" x2="790" y2="0" stroke-dasharray="0"
                                                stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                                            <g id="SvgjsG1592" class="apexcharts-yaxis-annotations"></g>
                                            <g id="SvgjsG1593" class="apexcharts-xaxis-annotations"></g>
                                            <g id="SvgjsG1594" class="apexcharts-point-annotations"></g>
                                        </g>
                                        <g id="SvgjsG1573" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                        <g id="SvgjsG1543" class="apexcharts-annotations"></g>
                                    </svg>
                                    <div class="apexcharts-legend"></div>
                                    <div class="apexcharts-tooltip apexcharts-theme-light">
                                        <div class="apexcharts-tooltip-title" style="font-family: Poppins; font-size: 12px;">
                                        </div>
                                        <div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(255, 255, 255);"></span>
                                            <div class="apexcharts-tooltip-text" style="font-family: Poppins; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-label"></span><span
                                                        class="apexcharts-tooltip-text-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                        <div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(255, 255, 255);"></span>
                                            <div class="apexcharts-tooltip-text" style="font-family: Poppins; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-label"></span><span
                                                        class="apexcharts-tooltip-text-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                        <div class="apexcharts-yaxistooltip-text"></div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Chart-->

                            <!--begin::Stats-->
                            <div class="card-spacer bg-white card-rounded flex-grow-1">
                                <!--begin::Row-->
                                <div class="row m-0">
                                    <div class="col px-8 py-6 mr-8">
                                        <div class="font-size-sm text-muted font-weight-bold">Average Sale</div>
                                        <div class="font-size-h4 font-weight-bolder">$650</div>
                                    </div>
                                    <div class="col px-8 py-6">
                                        <div class="font-size-sm text-muted font-weight-bold">Commission</div>
                                        <div class="font-size-h4 font-weight-bolder">$233,600</div>
                                    </div>
                                </div>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <div class="row m-0">
                                    <div class="col px-8 py-6 mr-8">
                                        <div class="font-size-sm text-muted font-weight-bold">Annual Taxes</div>
                                        <div class="font-size-h4 font-weight-bolder">$29,004</div>
                                    </div>
                                    <div class="col px-8 py-6">
                                        <div class="font-size-sm text-muted font-weight-bold">Annual Income</div>
                                        <div class="font-size-h4 font-weight-bolder">$1,480,00</div>
                                    </div>
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Stats-->
                            <div class="resize-triggers">
                                <div class="expand-trigger">
                                    <div style="width: 831px; height: 401px;"></div>
                                </div>
                                <div class="contract-trigger"></div>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 4-->
                </div>
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-xl-4">
                            <!--begin::Tiles Widget 21-->
                            <div class="card card-custom gutter-b" style="height: 250px">
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column p-0" style="position: relative;">
                                    <!--begin::Stats-->
                                    <div class="flex-grow-1 card-spacer pb-0">
                                        <span class="svg-icon svg-icon-2x svg-icon-info">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                    <path
                                                        d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                    <path
                                                        d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero"></path>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="font-weight-boldest font-size-h3 pt-2">875</div>
                                        <div class="text-muted font-weight-bold">New Customers</div>
                                    </div>
                                    <!--end::Stats-->

                                    <!--begin::Chart-->
                                    <div id="kt_tiles_widget_21_chart" class="card-rounded-bottom" data-color="info"
                                        style="height: 100px; min-height: 100px;">
                                        <div id="apexchartseo4xc4zdl"
                                            class="apexcharts-canvas apexchartseo4xc4zdl apexcharts-theme-light"
                                            style="width: 830px; height: 100px;"><svg id="SvgjsSvg1596" width="830" height="100"
                                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                                class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                style="background: transparent;">
                                                <g id="SvgjsG1598" class="apexcharts-inner apexcharts-graphical"
                                                    transform="translate(0, 0)">
                                                    <defs id="SvgjsDefs1597">
                                                        <clipPath id="gridRectMaskeo4xc4zdl">
                                                            <rect id="SvgjsRect1601" width="837" height="103" x="-3.5" y="-1.5"
                                                                rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                        </clipPath>
                                                        <clipPath id="gridRectMarkerMaskeo4xc4zdl">
                                                            <rect id="SvgjsRect1602" width="834" height="104" x="-2" y="-2"
                                                                rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                        </clipPath>
                                                    </defs>
                                                    <g id="SvgjsG1609" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                        <g id="SvgjsG1610" class="apexcharts-xaxis-texts-g"
                                                            transform="translate(0, -4)"></g>
                                                    </g>
                                                    <g id="SvgjsG1612" class="apexcharts-grid">
                                                        <g id="SvgjsG1613" class="apexcharts-gridlines-horizontal"
                                                            style="display: none;">
                                                            <line id="SvgjsLine1615" x1="0" y1="0" x2="830" y2="0"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine1616" x1="0" y1="10" x2="830" y2="10"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine1617" x1="0" y1="20" x2="830" y2="20"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine1618" x1="0" y1="30" x2="830" y2="30"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine1619" x1="0" y1="40" x2="830" y2="40"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine1620" x1="0" y1="50" x2="830" y2="50"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine1621" x1="0" y1="60" x2="830" y2="60"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine1622" x1="0" y1="70" x2="830" y2="70"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine1623" x1="0" y1="80" x2="830" y2="80"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine1624" x1="0" y1="90" x2="830" y2="90"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine1625" x1="0" y1="100" x2="830" y2="100"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                        </g>
                                                        <g id="SvgjsG1614" class="apexcharts-gridlines-vertical"
                                                            style="display: none;"></g>
                                                        <line id="SvgjsLine1627" x1="0" y1="100" x2="830" y2="100"
                                                            stroke="transparent" stroke-dasharray="0"></line>
                                                        <line id="SvgjsLine1626" x1="0" y1="1" x2="0" y2="100"
                                                            stroke="transparent" stroke-dasharray="0"></line>
                                                    </g>
                                                    <g id="SvgjsG1603" class="apexcharts-area-series apexcharts-plot-series">
                                                        <g id="SvgjsG1604" class="apexcharts-series" seriesName="NetxProfit"
                                                            data:longestSeries="true" rel="1" data:realIndex="0">
                                                            <path id="SvgjsPath1607"
                                                                d="M 0 100L 0 37.49999999999999C 58.099999999999994 37.49999999999999 107.9 37.49999999999999 166 37.49999999999999C 224.1 37.49999999999999 273.9 6.249999999999986 332 6.249999999999986C 390.1 6.249999999999986 439.9 53.12499999999999 498 53.12499999999999C 556.1 53.12499999999999 605.9 6.249999999999986 664 6.249999999999986C 722.1 6.249999999999986 771.9 6.249999999999986 830 6.249999999999986C 830 6.249999999999986 830 6.249999999999986 830 100M 830 6.249999999999986z"
                                                                fill="rgba(225,233,255,1)" fill-opacity="1" stroke-opacity="1"
                                                                stroke-linecap="butt" stroke-width="0" stroke-dasharray="0"
                                                                class="apexcharts-area" index="0"
                                                                clip-path="url(#gridRectMaskeo4xc4zdl)"
                                                                pathTo="M 0 100L 0 37.49999999999999C 58.099999999999994 37.49999999999999 107.9 37.49999999999999 166 37.49999999999999C 224.1 37.49999999999999 273.9 6.249999999999986 332 6.249999999999986C 390.1 6.249999999999986 439.9 53.12499999999999 498 53.12499999999999C 556.1 53.12499999999999 605.9 6.249999999999986 664 6.249999999999986C 722.1 6.249999999999986 771.9 6.249999999999986 830 6.249999999999986C 830 6.249999999999986 830 6.249999999999986 830 100M 830 6.249999999999986z"
                                                                pathFrom="M -1 100L -1 100L 166 100L 332 100L 498 100L 664 100L 830 100">
                                                            </path>
                                                            <path id="SvgjsPath1608"
                                                                d="M 0 37.49999999999999C 58.099999999999994 37.49999999999999 107.9 37.49999999999999 166 37.49999999999999C 224.1 37.49999999999999 273.9 6.249999999999986 332 6.249999999999986C 390.1 6.249999999999986 439.9 53.12499999999999 498 53.12499999999999C 556.1 53.12499999999999 605.9 6.249999999999986 664 6.249999999999986C 722.1 6.249999999999986 771.9 6.249999999999986 830 6.249999999999986"
                                                                fill="none" fill-opacity="1" stroke="#6993ff" stroke-opacity="1"
                                                                stroke-linecap="butt" stroke-width="3" stroke-dasharray="0"
                                                                class="apexcharts-area" index="0"
                                                                clip-path="url(#gridRectMaskeo4xc4zdl)"
                                                                pathTo="M 0 37.49999999999999C 58.099999999999994 37.49999999999999 107.9 37.49999999999999 166 37.49999999999999C 224.1 37.49999999999999 273.9 6.249999999999986 332 6.249999999999986C 390.1 6.249999999999986 439.9 53.12499999999999 498 53.12499999999999C 556.1 53.12499999999999 605.9 6.249999999999986 664 6.249999999999986C 722.1 6.249999999999986 771.9 6.249999999999986 830 6.249999999999986"
                                                                pathFrom="M -1 100L -1 100L 166 100L 332 100L 498 100L 664 100L 830 100">
                                                            </path>
                                                            <g id="SvgjsG1605" class="apexcharts-series-markers-wrap"
                                                                data:realIndex="0">
                                                                <g class="apexcharts-series-markers">
                                                                    <circle id="SvgjsCircle1633" r="0" cx="0" cy="0"
                                                                        class="apexcharts-marker ww7zgspmb no-pointer-events"
                                                                        stroke="#6993ff" fill="#e1e9ff" fill-opacity="1"
                                                                        stroke-width="3" stroke-opacity="0.9"
                                                                        default-marker-size="0"></circle>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="SvgjsG1606" class="apexcharts-datalabels" data:realIndex="0"></g>
                                                    </g>
                                                    <line id="SvgjsLine1628" x1="0" y1="0" x2="830" y2="0" stroke="#b6b6b6"
                                                        stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs">
                                                    </line>
                                                    <line id="SvgjsLine1629" x1="0" y1="0" x2="830" y2="0" stroke-dasharray="0"
                                                        stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                                                    <g id="SvgjsG1630" class="apexcharts-yaxis-annotations"></g>
                                                    <g id="SvgjsG1631" class="apexcharts-xaxis-annotations"></g>
                                                    <g id="SvgjsG1632" class="apexcharts-point-annotations"></g>
                                                </g>
                                                <g id="SvgjsG1611" class="apexcharts-yaxis" rel="0"
                                                    transform="translate(-18, 0)"></g>
                                                <g id="SvgjsG1599" class="apexcharts-annotations"></g>
                                            </svg>
                                            <div class="apexcharts-legend"></div>
                                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                                <div class="apexcharts-tooltip-title"
                                                    style="font-family: Poppins; font-size: 12px;"></div>
                                                <div class="apexcharts-tooltip-series-group"><span
                                                        class="apexcharts-tooltip-marker"
                                                        style="background-color: rgb(225, 233, 255);"></span>
                                                    <div class="apexcharts-tooltip-text"
                                                        style="font-family: Poppins; font-size: 12px;">
                                                        <div class="apexcharts-tooltip-y-group"><span
                                                                class="apexcharts-tooltip-text-label"></span><span
                                                                class="apexcharts-tooltip-text-value"></span></div>
                                                        <div class="apexcharts-tooltip-z-group"><span
                                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light">
                                                <div class="apexcharts-xaxistooltip-text"
                                                    style="font-family: Poppins; font-size: 12px;"></div>
                                            </div>
                                            <div
                                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                <div class="apexcharts-yaxistooltip-text"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Chart-->
                                    <div class="resize-triggers">
                                        <div class="expand-trigger">
                                            <div style="width: 831px; height: 251px;"></div>
                                        </div>
                                        <div class="contract-trigger"></div>
                                    </div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Tiles Widget 21-->
                        </div>
                        <div class="col-xl-8">
                            <!--begin::Tiles Widget 25-->
                            <div class="card card-custom bgi-no-repeat bgi-size-cover gutter-b bg-primary"
                                style="height: 250px; background-image: url(assets/media/svg/patterns/taieri.svg)">
                                <div class="card-body d-flex">
                                    <div class="d-flex py-5 flex-column align-items-start flex-grow-1">
                                        <div class="flex-grow-1">
                                            <a href="#" class="text-white font-weight-bolder font-size-h3">Create CRM
                                                Reports</a>
                                            <p class="text-white opacity-75 font-weight-bold mt-3">
                                                Outlines keep you and honest indulging honest.
                                            </p>
                                        </div>
                                        <a href="#" class="btn btn-link btn-link-white font-weight-bold">
                                            Read More
                                            <span class="svg-icon svg-icon-lg svg-icon-white">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                        <rect fill="#000000" opacity="0.3"
                                                            transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) "
                                                            x="11" y="5" width="2" height="14" rx="1"></rect>
                                                        <path
                                                            d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) ">
                                                        </path>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span> </a>
                                    </div>
                                </div>
                            </div>
                            <!--end::Tiles Widget 25-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-8">

                            <!--begin::Tiles Widget 23-->
                            <div class="card card-custom gutter-b" style="height: 250px">
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column p-0" style="position: relative;">
                                    <!--begin::Stats-->
                                    <div class="flex-grow-1 card-spacer pb-0">
                                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="mr-2">
                                                <a href="#"
                                                    class="text-dark-75 text-hover-primary font-weight-bolder font-size-h2">Generate
                                                    Reports</a>
                                                <div class="text-muted font-size-lg font-weight-bold pt-2">Finance and
                                                    accounting reports</div>
                                            </div>
                                            <div class="font-weight-bolder font-size-h3 text-success">$24,500</div>
                                        </div>
                                    </div>
                                    <!--end::Stats-->

                                    <!--begin::Chart-->
                                    <div id="kt_tiles_widget_23_chart" class="card-rounded-bottom" data-color="success"
                                        style="height: 100px; min-height: 125px;">
                                        <div id="apexchartsb1w7fkaz"
                                            class="apexcharts-canvas apexchartsb1w7fkaz apexcharts-theme-light"
                                            style="width: 830px; height: 125px;"><svg id="SvgjsSvg1635" width="830" height="125"
                                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                                class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                style="background: transparent;">
                                                <g id="SvgjsG1637" class="apexcharts-inner apexcharts-graphical"
                                                    transform="translate(0, 0)">
                                                    <defs id="SvgjsDefs1636">
                                                        <clipPath id="gridRectMaskb1w7fkaz">
                                                            <rect id="SvgjsRect1640" width="837" height="128" x="-3.5" y="-1.5"
                                                                rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                        </clipPath>
                                                        <clipPath id="gridRectMarkerMaskb1w7fkaz">
                                                            <rect id="SvgjsRect1641" width="834" height="129" x="-2" y="-2"
                                                                rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                        </clipPath>
                                                    </defs>
                                                    <g id="SvgjsG1648" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                        <g id="SvgjsG1649" class="apexcharts-xaxis-texts-g"
                                                            transform="translate(0, -4)"></g>
                                                    </g>
                                                    <g id="SvgjsG1651" class="apexcharts-grid">
                                                        <g id="SvgjsG1652" class="apexcharts-gridlines-horizontal"
                                                            style="display: none;">
                                                            <line id="SvgjsLine1654" x1="0" y1="0" x2="830" y2="0"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine1655" x1="0" y1="12.5" x2="830" y2="12.5"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine1656" x1="0" y1="25" x2="830" y2="25"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine1657" x1="0" y1="37.5" x2="830" y2="37.5"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine1658" x1="0" y1="50" x2="830" y2="50"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine1659" x1="0" y1="62.5" x2="830" y2="62.5"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine1660" x1="0" y1="75" x2="830" y2="75"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine1661" x1="0" y1="87.5" x2="830" y2="87.5"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine1662" x1="0" y1="100" x2="830" y2="100"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine1663" x1="0" y1="112.5" x2="830" y2="112.5"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine1664" x1="0" y1="125" x2="830" y2="125"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                        </g>
                                                        <g id="SvgjsG1653" class="apexcharts-gridlines-vertical"
                                                            style="display: none;"></g>
                                                        <line id="SvgjsLine1666" x1="0" y1="125" x2="830" y2="125"
                                                            stroke="transparent" stroke-dasharray="0"></line>
                                                        <line id="SvgjsLine1665" x1="0" y1="1" x2="0" y2="125"
                                                            stroke="transparent" stroke-dasharray="0"></line>
                                                    </g>
                                                    <g id="SvgjsG1642" class="apexcharts-area-series apexcharts-plot-series">
                                                        <g id="SvgjsG1643" class="apexcharts-series" seriesName="NetxProfit"
                                                            data:longestSeries="true" rel="1" data:realIndex="0">
                                                            <path id="SvgjsPath1646"
                                                                d="M 0 125L 0 90.9090909090909C 58.099999999999994 90.9090909090909 107.9 68.18181818181819 166 68.18181818181819C 224.1 68.18181818181819 273.9 90.9090909090909 332 90.9090909090909C 390.1 90.9090909090909 439.9 34.09090909090909 498 34.09090909090909C 556.1 34.09090909090909 605.9 79.54545454545455 664 79.54545454545455C 722.1 79.54545454545455 771.9 11.36363636363636 830 11.36363636363636C 830 11.36363636363636 830 11.36363636363636 830 125M 830 11.36363636363636z"
                                                                fill="rgba(201,247,245,1)" fill-opacity="1" stroke-opacity="1"
                                                                stroke-linecap="butt" stroke-width="0" stroke-dasharray="0"
                                                                class="apexcharts-area" index="0"
                                                                clip-path="url(#gridRectMaskb1w7fkaz)"
                                                                pathTo="M 0 125L 0 90.9090909090909C 58.099999999999994 90.9090909090909 107.9 68.18181818181819 166 68.18181818181819C 224.1 68.18181818181819 273.9 90.9090909090909 332 90.9090909090909C 390.1 90.9090909090909 439.9 34.09090909090909 498 34.09090909090909C 556.1 34.09090909090909 605.9 79.54545454545455 664 79.54545454545455C 722.1 79.54545454545455 771.9 11.36363636363636 830 11.36363636363636C 830 11.36363636363636 830 11.36363636363636 830 125M 830 11.36363636363636z"
                                                                pathFrom="M -1 125L -1 125L 166 125L 332 125L 498 125L 664 125L 830 125">
                                                            </path>
                                                            <path id="SvgjsPath1647"
                                                                d="M 0 90.9090909090909C 58.099999999999994 90.9090909090909 107.9 68.18181818181819 166 68.18181818181819C 224.1 68.18181818181819 273.9 90.9090909090909 332 90.9090909090909C 390.1 90.9090909090909 439.9 34.09090909090909 498 34.09090909090909C 556.1 34.09090909090909 605.9 79.54545454545455 664 79.54545454545455C 722.1 79.54545454545455 771.9 11.36363636363636 830 11.36363636363636"
                                                                fill="none" fill-opacity="1" stroke="#1bc5bd" stroke-opacity="1"
                                                                stroke-linecap="butt" stroke-width="3" stroke-dasharray="0"
                                                                class="apexcharts-area" index="0"
                                                                clip-path="url(#gridRectMaskb1w7fkaz)"
                                                                pathTo="M 0 90.9090909090909C 58.099999999999994 90.9090909090909 107.9 68.18181818181819 166 68.18181818181819C 224.1 68.18181818181819 273.9 90.9090909090909 332 90.9090909090909C 390.1 90.9090909090909 439.9 34.09090909090909 498 34.09090909090909C 556.1 34.09090909090909 605.9 79.54545454545455 664 79.54545454545455C 722.1 79.54545454545455 771.9 11.36363636363636 830 11.36363636363636"
                                                                pathFrom="M -1 125L -1 125L 166 125L 332 125L 498 125L 664 125L 830 125">
                                                            </path>
                                                            <g id="SvgjsG1644" class="apexcharts-series-markers-wrap"
                                                                data:realIndex="0">
                                                                <g class="apexcharts-series-markers">
                                                                    <circle id="SvgjsCircle1672" r="0" cx="498"
                                                                        cy="34.09090909090909"
                                                                        class="apexcharts-marker w44vhmlbl no-pointer-events"
                                                                        stroke="#1bc5bd" fill="#c9f7f5" fill-opacity="1"
                                                                        stroke-width="3" stroke-opacity="0.9"
                                                                        default-marker-size="0"></circle>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="SvgjsG1645" class="apexcharts-datalabels" data:realIndex="0"></g>
                                                    </g>
                                                    <line id="SvgjsLine1667" x1="0" y1="0" x2="830" y2="0" stroke="#b6b6b6"
                                                        stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs">
                                                    </line>
                                                    <line id="SvgjsLine1668" x1="0" y1="0" x2="830" y2="0" stroke-dasharray="0"
                                                        stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                                                    <g id="SvgjsG1669" class="apexcharts-yaxis-annotations"></g>
                                                    <g id="SvgjsG1670" class="apexcharts-xaxis-annotations"></g>
                                                    <g id="SvgjsG1671" class="apexcharts-point-annotations"></g>
                                                </g>
                                                <g id="SvgjsG1650" class="apexcharts-yaxis" rel="0"
                                                    transform="translate(-18, 0)"></g>
                                                <g id="SvgjsG1638" class="apexcharts-annotations"></g>
                                            </svg>
                                            <div class="apexcharts-legend"></div>
                                            <div class="apexcharts-tooltip apexcharts-theme-light"
                                                style="left: 313.969px; top: 37.0909px;">
                                                <div class="apexcharts-tooltip-title"
                                                    style="font-family: Poppins; font-size: 12px;">Apr, 2020</div>
                                                <div class="apexcharts-tooltip-series-group apexcharts-active"
                                                    style="display: flex;"><span class="apexcharts-tooltip-marker"
                                                        style="background-color: rgb(201, 247, 245);"></span>
                                                    <div class="apexcharts-tooltip-text"
                                                        style="font-family: Poppins; font-size: 12px;">
                                                        <div class="apexcharts-tooltip-y-group"><span
                                                                class="apexcharts-tooltip-text-label">Net Profit: </span><span
                                                                class="apexcharts-tooltip-text-value">$40 thousands</span></div>
                                                        <div class="apexcharts-tooltip-z-group"><span
                                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"
                                                style="left: 461.148px; top: 127px;">
                                                <div class="apexcharts-xaxistooltip-text"
                                                    style="font-family: Poppins; font-size: 12px; min-width: 52.7031px;">Apr,
                                                    2020</div>
                                            </div>
                                            <div
                                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                <div class="apexcharts-yaxistooltip-text"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Chart-->
                                    <div class="resize-triggers">
                                        <div class="expand-trigger">
                                            <div style="width: 831px; height: 251px;"></div>
                                        </div>
                                        <div class="contract-trigger"></div>
                                    </div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Tiles Widget 23-->
                        </div>
                        <div class="col-xl-4">
                            <!--begin::Tiles Widget 24-->
                            <div class="card card-custom bgi-no-repeat bgi-size-cover gutter-b"
                                style="height: 250px; background-image: url(assets/media/stock-600x400/img-28.jpg)">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <a href="#" class="text-dark-75 text-hover-primary font-weight-bolder font-size-h3">
                                        Weekly Sales Stats
                                    </a>
                                    <div class="text-dark-50 font-weight-bold font-size-lg pt-2">
                                        890,344 Sales
                                    </div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Tiles Widget 24-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
