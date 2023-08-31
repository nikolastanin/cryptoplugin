<?php
/**
 * Plugin Name: Test
 * Plugin URI: test
 * Version: 1.0
 *
 * @package test
 */


add_action(
    'wp_enqueue_scripts',
    function() {
        wp_enqueue_style( 'swiper-bundle-css', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css', '', '1.0' );
        wp_enqueue_script( 'swiper-bundle-js', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', '', '1.0' , true);
        wp_enqueue_script( 'swiper-custom-init',  plugin_dir_url(__DIR__) . 'crypto-fx/script.js', 'swiper-bundle-js', time() , true);
        wp_enqueue_script('alpine-js', 'https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js', '','1.0', true);
        wp_enqueue_script('alpine-plugin-js',  plugin_dir_url(__DIR__) . 'crypto-fx/alpine-plugin.js', 'alpine-js', time() , true);

    }
);


add_shortcode('crypto-fx', function(){
?>
<section class="crypto-fx-container"
         x-data="{ tab: 'tab-1', name:'nikola', money:5000,
         refundable_fee:{
            '5000' : 70,
            '10000' : 130,
            '25000' : 250,
            '50000' : 440,
            '100000' : 630 },
            fx_step : 'fx-step-1',
            formatter : function(value){
            const formatter = new Intl.NumberFormat('en-US', {
          style: 'currency',
          currency: 'USD',
          maximumFractionDigits: 0
        });
           return formatter.format(value);
            },
            isFx:false,
            toggleFxClass : function(){
                this.isFx = !this.isFx;
            },
            swiperDefault : function(){
                 swiper[0].slideTo(0);
                 swiper[1].slideTo(0);
                 swiper[2].slideTo(0);
                 // uncomment this if revert money also! this.money = 5000;
            }


            }"
         x-init="{ tab: 'tab-1' }"
>
    <h2 class="elementor-heading-title elementor-size-default">SELECT FROM A WIDE VARIETY OF CHALLENGES</h2>
<!--    tabs switcher-->
    <div class="crypto-fx-tabs-switcher">
        <!-- Rounded switch -->
        <label class="switch">
            <input type="checkbox" @click="tab = (tab === 'tab-1' ? 'tab-2' : 'tab-1'); toggleFxClass(); swiperDefault();">
            <span class="slider round" x-bind:class="{ 'fx': isFx }"></span>
        </label>
    </div>
    <div x-text="formatter(money)"></div>
    <div class="prices-container">
        <div class="elementor-button-wrapper prices" @click.prevent="money=5000">
            <a class="elementor-button elementor-button-link elementor-size-sm elementor-animation-flip"
                href="/app-landing/#contact">
                <span class="elementor-button-content-wrapper">
                    <span class="ui-btn-anim-wrapp"><span class="elementor-button-text">$5,000</span><span
                            class="elementor-button-text">$5,000</span></span>
                </span>
            </a>
        </div>
        <div class="elementor-button-wrapper prices" @click.prevent="money=10000">
            <a class="elementor-button elementor-button-link elementor-size-sm elementor-animation-flip"
                href="/app-landing/#contact">
                <span class="elementor-button-content-wrapper">
                    <span class="ui-btn-anim-wrapp"><span class="elementor-button-text">$10,000</span><span
                            class="elementor-button-text">$10,000</span></span>
                </span>
            </a>
        </div>
        <div class="elementor-button-wrapper prices" @click.prevent="money=25000">
            <a class="elementor-button elementor-button-link elementor-size-sm elementor-animation-flip"
                href="/app-landing/#contact">
                <span class="elementor-button-content-wrapper">
                    <span class="ui-btn-anim-wrapp"><span class="elementor-button-text">$25,000</span><span
                            class="elementor-button-text">$25,000</span></span>
                </span>
            </a>
        </div>
        <div class="elementor-button-wrapper prices" @click.prevent="money=50000">
            <a class="elementor-button elementor-button-link elementor-size-sm elementor-animation-flip"
                href="/app-landing/#contact">
                <span class="elementor-button-content-wrapper">
                    <span class="ui-btn-anim-wrapp"><span class="elementor-button-text">$50,000</span><span
                            class="elementor-button-text">$50,000</span></span>
                </span>
            </a>
        </div>
        <div class="elementor-button-wrapper prices" @click.prevent="money=100000">
            <a class="elementor-button elementor-button-link elementor-size-sm elementor-animation-flip"
                href="/app-landing/#contact">
                <span class="elementor-button-content-wrapper">
                    <span class="ui-btn-anim-wrapp"><span class="elementor-button-text">$100,000</span><span
                            class="elementor-button-text">$100,000</span></span>
                </span>
            </a>
        </div>
    </div>
<!--    steps changer-->
    <div x-show="tab === 'tab-2'"  class="fx-steps-buttons-container">
        <div class="elementor-button-wrapper step-btn challenges"  @click.prevent="fx_step ='fx-step-1'; swiperDefault();">
            <a class="elementor-button elementor-button-link elementor-size-sm elementor-animation-flip"
               href="/app-landing/#contact">
                <span class="elementor-button-content-wrapper">
                    <span class="ui-btn-anim-wrapp"><span class="elementor-button-text">1-STEP-CHALLENGE</span><span
                                class="elementor-button-text">1-STEP-CHALLENGE</span></span>
                </span>
            </a>
        </div>
        <div class="elementor-button-wrapper step-btn challenges" @click.prevent="fx_step ='fx-step-2'; swiperDefault();">
            <a class="elementor-button elementor-button-link elementor-size-sm elementor-animation-flip"
               href="/app-landing/#contact">
                <span class="elementor-button-content-wrapper">
                    <span class="ui-btn-anim-wrapp"><span class="elementor-button-text">2-STEP-CHALLENGE</span><span
                                class="elementor-button-text">2-STEP-CHALLENGE</span></span>
                </span>
            </a>
        </div>
    </div>

<!--   TABS-->
    <div class="tabs-container" x-cloak>
        <div x-show="tab === 'tab-1'" class="tab-1" init="false">
            <div class="swiper">
                <div class="columns-wrapper  swiper-wrapper">
                <div class="columns swiper-slide">
                    <ul class="price">
                        <li class="header">Phase 1</li>
                        <li x-html="'Profit Target <br> <strong>' + formatter((money*0.10 + (money)))" ></li>
                        <li>Max Daily Loss <br> <strong>5%</strong></li>
                        <li x-html="'Max Drawdown Loss <br><strong>' + formatter((money*0.08) )"></li>
                        <li>Leverage<br><strong>Up to 30%</strong></li>
                        <li x-html="'Refundable fee <br><strong>' + formatter(refundable_fee[money])">Refundable Fee</li>
                    </ul>
                </div>
                <div class="columns swiper-slide">
                    <ul class="price">
                        <li class="header">Phase 2</li>
                        <li  x-html="'Profit Target <br><strong>' + formatter((money*0.05 + (money)))" ></li>
                        <li>Max Daily Loss <br> <strong>5%</strong></li>
                        <li x-html="'Max Drawdown Loss <br><strong>' + formatter((money*0.08)) "></li>
                        <li>Leverage<br><strong>Up to 30%</strong></li>
                        <li x-html="'Refundable fee <br><strong> N/A'">Refundable Fee</li>
                    </ul>
                </div>
                <div class="columns swiper-slide">
                    <ul class="price">
                        <li class="header">Funded Account</li>
                        <li x-html="'Profit Target <br><strong>' + (money*0)" ></li>
                        <li>Max Daily Loss <br> <strong>5%</strong></li>
                        <li x-html="'Max Drawdown Loss <br><strong>' + formatter((money*0.08)) "></li>
                        <li>Leverage<br><strong>Up to 30%</strong></li>
                        <li x-html="'Refundable fee <br><strong> 100%'">Refundable Fee</li>
                    </ul>
                </div>
            </div>
            </div>
            </div>
        <div x-show="tab === 'tab-2'" class="tab-2" init="false">
           <div class="swiper">
               <div x-show="fx_step === 'fx-step-1'" class="columns-wrapper  swiper-wrapper fx-steps1">
                   1steps
                   <div class="columns cols-50 swiper-slide">
                       <ul class="price">
                           <li class="header">Phase 1 FX FX FX</li>
                           <li x-html="'Profit Target <br> <strong>' + formatter((money*0.10 + (money)))" ></li>
                           <li>Max Daily Loss <br> <strong>5%</strong></li>
                           <li x-html="'Max Drawdown Loss <br><strong>' + formatter((money*0.08) )"></li>
                           <li>Leverage<br><strong>Up to 30%</strong></li>
                           <li x-html="'Refundable fee <br><strong>' + formatter(refundable_fee[money])">Refundable Fee</li>
                       </ul>
                   </div>
                   <div class="columns cols-50 swiper-slide">
                       <ul class="price">
                           <li class="header">Funded Account</li>
                           <li x-html="'Profit Target <br><strong>' + (money*0)" ></li>
                           <li>Max Daily Loss <br> <strong>5%</strong></li>
                           <li x-html="'Max Drawdown Loss <br><strong>' + formatter((money*0.08)) "></li>
                           <li>Leverage<br><strong>Up to 30%</strong></li>
                           <li x-html="'Refundable fee <br><strong> 100%'">Refundable Fee</li>
                       </ul>
                   </div>
               </div>
           </div>
            <div class="swiper">
                <div x-show="fx_step === 'fx-step-2'" class="columns-wrapper  swiper-wrapper fx-step2">
                    2 steps
                    <div class="columns swiper-slide">
                        <ul class="price">
                            <li class="header">Phase 1 FX FX FX</li>
                            <li x-html="'Profit Target <br> <strong>' + formatter((money*0.10 + (money)))" ></li>
                            <li>Max Daily Loss <br> <strong>5%</strong></li>
                            <li x-html="'Max Drawdown Loss <br><strong>' + formatter((money*0.08) )"></li>
                            <li>Leverage<br><strong>Up to 30%</strong></li>
                            <li x-html="'Refundable fee <br><strong>' + formatter(refundable_fee[money])">Refundable Fee</li>
                        </ul>
                    </div>
                    <div class="columns swiper-slide">
                        <ul class="price">
                            <li class="header">Phase 2</li>
                            <li  x-html="'Profit Target <br><strong>' + formatter((money*0.05 + (money)))" ></li>
                            <li>Max Daily Loss <br> <strong>5%</strong></li>
                            <li x-html="'Max Drawdown Loss <br><strong>' + formatter((money*0.08)) "></li>
                            <li>Leverage<br><strong>Up to 30%</strong></li>
                            <li x-html="'Refundable fee <br><strong> N/A'">Refundable Fee</li>
                        </ul>
                    </div>
                    <div class="columns swiper-slide">
                        <ul class="price">
                            <li class="header">Funded Account</li>
                            <li x-html="'Profit Target <br><strong>' + (money*0)" ></li>
                            <li>Max Daily Loss <br> <strong>5%</strong></li>
                            <li x-html="'Max Drawdown Loss <br><strong>' + formatter((money*0.08)) "></li>
                            <li>Leverage<br><strong>Up to 30%</strong></li>
                            <li x-html="'Refundable fee <br><strong> 100%'">Refundable Fee</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-btns">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>

    <div class="cta">
        <div class="elementor-button-wrapper">
            <a class="elementor-button elementor-button-link elementor-size-sm elementor-animation-flip"
                href="/app-landing/#contact">
                <span class="elementor-button-content-wrapper">
                    <span class="ui-btn-anim-wrapp"><span class="elementor-button-text">GET FUNDED</span><span
                            class="elementor-button-text">GET FUNDED</span></span>
                </span>
            </a>
        </div>
    </div>

</section>

<style>
    [x-cloak] {
        display: none !important;
    }
    .step-btn{
        margin:5px;
    }
    .prices>.elementor-button {
        background-color: white !important;
        color: #0DA5FA !important;
        border: 2px solid #0DA5FA !important;
    }
    .prices>.elementor-button.active {
        background-color: #0DA5FA !important;
        color: white !important;
        border: 2px solid #0DA5FA !important;
    }


    .challenges>.elementor-button {
        background-color: white !important;
        color: #0DA5FA !important;
        border: 2px solid #0DA5FA !important;
    }
    .challenges>.elementor-button.active {
        background-color: #0DA5FA !important;
        color: white !important;
        border: 2px solid #0DA5FA !important;
    }

    .fx-steps-buttons-container {
        display: flex;
        justify-content: space-evenly;
    }

    .swiper-btns {
        position: absolute;
        width: 100%;
        top: 50%;
    }
    .swiper-btns {
        display: none !important;
    }
    .tabs-container{
        position: relative;
    }
    .crypto-fx-tabs-switcher {
        display: flex;
        justify-content: center;
        padding: 20px;
    }

    .columns.swiper-slide {
        width: 30.33% !important;
    }
    .columns.cols-50.swiper-slide{
        width:50% !important;
    }

    .prices-container {
        display: flex;
        justify-content: space-evenly;
        padding: 20px;
    }
    .price .header {
        color: #0DA5FA;
        font-size: 32px;
        font-weight: 600;
    }
    .cta {
        text-align: center;
        margin: 20px;
    }

    /*TODO: --end of mine ----*/

    /* Create three columns of equal width */
    .columns {
        float: left;
        width: 33.3%;
        padding: 8px;
    }

    /* Style the list */
    .price {
        list-style-type: none;
        border: 1px solid #eee;
        margin: 0;
        -webkit-transition: 0.3s;
        transition: 0.3s;
        box-shadow: 0 8px 12px 0 rgba(0, 0, 0, 0.2);
        padding :0 15px 0 15px;
        border-top: 6px solid #111;

    }

    /* Add shadows on hover */
    .price:hover {
        background-image: linear-gradient(0deg, #157EFD 0%, #09C9FC 100%);
    }
    ul.price:hover li {
        color: white;
    }

    /* List items */
    .price li {
        padding: 15px;
        color: black;
        font-size: 15px;
        text-align: center;
    }
    .price li:not(:last-child){
        border-bottom: 1px dashed #eee;
    }
    .price li strong{
        font-size : 22px;
    }
    /* Grey list item */
    .price .grey {
        background-color: #eee;
        font-size: 20px;
    }

    /* The "Sign Up" button */
    .button {
        background-color: #04AA6D;
        border: none;
        color: white;
        padding: 10px 25px;
        text-align: center;
        text-decoration: none;
        font-size: 18px;
    }

    /* Change the width of the three columns to 100%
    (to stack horizontally on small screens) */
    @media only screen and (max-width: 767px) {
        .columns {
            width: 100%;
        }

        .columns.swiper-slide {
            width: 100% !important;
        }
        .columns.cols-50.swiper-slide{
            width:100% !important;
        }

        .swiper-btns {
            display: block !important;
        }

        .prices-container {
            flex-wrap: wrap;
        }

        .elementor-button-wrapper.prices {
            margin-bottom: 5px;
        }
    }



    /*switcher*/

    /* The switch - the box around the slider */
    .switch {
        position: relative;
        display: inline-block;
        width: 300px;
        height: 65px;
    }

    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #2196F3;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "CRYPTO";
        height: 55px;
        width: 150px;
        text-align: center;
        left: 5px;
        bottom: 5px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
        font-weight: bold;
    }

    .slider.fx:before{
        content : 'FX';
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(140px);
        -ms-transform: translateX(140px);
        transform: translateX(140px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 34px;
    }
</style>

    <style>
        .swiper-button-prev, .swiper-button-next {
            background: #157efd;
            border-radius: 100%;
            color: #ffffff;
            height: 40px;
            width: 40px;
        }
        .swiper-button-prev, .swiper-rtl .swiper-button-next {
            left: 10px;
            right: auto;
            font-family:none !important;

        }
        .swiper-button-next, .swiper-button-prev {
            position: absolute;
            top: 50%;
            /* width: calc(var(--swiper-navigation-size)/ 44 * 27); */
            height: var(--swiper-navigation-size);
            margin-top: calc(0px - (var(--swiper-navigation-size)/ 2));
            z-index: 10;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--swiper-navigation-color,var(--swiper-theme-color));
            font-family:none !important;
        }

        swiper-button-next:after, .swiper-button-prev:after {
            content:'previous';
            font-size : 15px !Important;
            width : 15px;
            height:15px;
            position:relative;
            left:-5px;
            color:white;
            font-weight: bold;
        }
        swiper-button-next:after, .swiper-button-prev:before {
            content:'';
            font-size : 15px !Important;
            width : 15px;
            height:15px;
            color:white;
            font-weight: bold;
        }

        .swiper-button-next:after, .swiper-rtl .swiper-button-prev:after {
            content: 'next';
            font-size : 15px !Important;
            color:white;
            font-weight: bold;
        }
        .swiper-button-prev, .swiper-button-next {
            margin: 0 -20px 0;
            width: 44px;
            height: 44px;
        }
    </style>

<?php

});