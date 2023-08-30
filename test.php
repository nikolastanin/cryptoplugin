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
            formatter : function(value){
            const formatter = new Intl.NumberFormat('en-US', {
          style: 'currency',
          currency: 'USD',
          maximumFractionDigits: 0
        });
           return formatter.format(value);
            }

            }"
         x-init="{ tab: 'tab-1' }"
>
    <h2 class="elementor-heading-title elementor-size-default">SELECT FROM A WIDE VARIETY OF CHALLENGES</h2>
    <div class="crypto-fx-tabs-buttons">
        <!-- Rounded switch -->
        <label class="switch">
            <input type="checkbox" @click="tab = (tab === 'tab-1' ? 'tab-2' : 'tab-1');">
            <span class="slider round"></span>
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

    <div class="tabs-container" x-cloak>
        <div x-show="tab === 'tab-1'" class="tab-1 swiper">
            <div class="columns-wrapper  swiper-wrapper">
                <div class="columns swiper-slide">
                    <ul class="price">
                        <li class="header">Phase 1</li>
                        <li x-html="'Profit Target <br>' + formatter((money*0.10 + (money)))" ></li>
                        <li>Max Daily Loss <br>5%</li>
                        <li x-html="'Max Drawdown Loss <br>' + formatter((money*0.08) )"></li>
                        <li>Leverage<br>Up to 30%</li>
                        <li x-html="'Refundable fee <br>' + formatter(refundable_fee[money])">Refundable Fee</li>
                    </ul>
                </div>
                <div class="columns swiper-slide">
                    <ul class="price">
                        <li class="header">Phase 2</li>
                        <li x-html="'Profit Target <br>' + formatter((money*0.05 + (money)))" ></li>
                        <li>Max Daily Loss <br>5%</li>
                        <li x-html="'Max Drawdown Loss <br>' + formatter((money*0.08)) "></li>
                        <li>Leverage<br>Up to 30%</li>
                        <li x-html="'Refundable fee <br> N/A'">Refundable Fee</li>
                    </ul>
                </div>
                <div class="columns swiper-slide">
                    <ul class="price">
                        <li class="header">Funded Account</li>
                        <li x-html="'Profit Target <br>' + (money*0)" ></li>
                        <li>Max Daily Loss <br>5%</li>
                        <li x-html="'Max Drawdown Loss <br>' + formatter((money*0.08)) "></li>
                        <li>Leverage<br>Up to 30%</li>
                        <li x-html="'Refundable fee <br> 100%'">Refundable Fee</li>
                    </ul>
                </div>
            </div>
        </div>
        <div x-show="tab === 'tab-2'" class="tab-2 swiper">
            <div class="columns-wrapper  swiper-wrapper">
                <div class="columns swiper-slide">
                    <ul class="price">
                        <li class="header">Basic NIDZO SLIDE 2</li>
                        <li class="grey">$ 9.99 / year</li>
                        <li>10GB Storage</li>
                        <li>10 Emails</li>
                        <li>10 Domains</li>
                        <li>1GB Bandwidth</li>
                        <li class="grey"><a href="#" class="button">Sign Up</a></li>
                    </ul>
                </div>
                <div class="columns swiper-slide">
                    <ul class="price">
                        <li class="header">Basic</li>
                        <li class="grey">$ 9.99 / year</li>
                        <li>10GB Storage</li>
                        <li>10 Emails</li>
                        <li>10 Domains</li>
                        <li>1GB Bandwidth</li>
                        <li class="grey"><a href="#" class="button">Sign Up</a></li>
                    </ul>
                </div>
                <div class="columns swiper-slide">
                    <ul class="price">
                        <li class="header">Basic</li>
                        <li class="grey">$ 9.99 / year</li>
                        <li>10GB Storage</li>
                        <li>10 Emails</li>
                        <li>10 Domains</li>
                        <li>1GB Bandwidth</li>
                        <li class="grey"><a href="#" class="button">Sign Up</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
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

    .swiper-button-prev,
    .swiper-button-next {
        display: none;
    }

    .crypto-fx-tabs-buttons {
        display: flex;
        justify-content: center;
        padding: 20px;
    }

    .columns.swiper-slide {
        width: 30.33% !important;
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

        .swiper-button-prev,
        .swiper-button-next {
            display: block;
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
        width: 60px;
        height: 34px;
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
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>

<?php

});