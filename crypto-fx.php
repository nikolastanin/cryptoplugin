<?php
/**
 * Plugin Name: Crypto-Fx pricing plugin
 * Author: Nikola Stanin
 * Author URI: https://github.com/nikolastanin
 * Version: 1.01
 *
 * @package crypto-fx-plugin
 */


add_action(
    'wp_enqueue_scripts',
    function() {
        $ver = time();
        wp_enqueue_script( 'popper-bundle-js', 'https://unpkg.com/@popperjs/core@2', '', '1.0' , true);
        wp_enqueue_script( 'tippy-bundle-js', 'https://unpkg.com/tippy.js@6', '', '1.0' , true);
        wp_enqueue_style( 'swiper-bundle-css', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css', '', '1.0' );
        wp_enqueue_script( 'swiper-bundle-js', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', '', '1.0' , true);
        wp_enqueue_script( 'swiper-custom-init',  plugin_dir_url(__DIR__) . 'crypto-fx/script.js', array('swiper-bundle-js', 'tippy-bundle-js'), $ver , true);
        wp_enqueue_script('alpine-js', 'https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js', '','1.0', true);
        wp_enqueue_style('crypto-fx',plugin_dir_url(__DIR__) . 'crypto-fx/styles.css', '', $ver);
    }
);


add_shortcode('crypto-fx', function(){
?>
<section class="crypto-fx-container" x-data="{ tab: 'tab-1', name:'nikola', money:25000,
         refundable_fee:{
            '5000' : 70,
            '10000' : 130,
            '25000' : 250,
            '50000' : 440,
            '100000' : 630 },
            refundable_fee_fx:{
            '5000' : 70,
            '10000' : 100,
            '25000' : 200,
            '50000' : 350,
            '100000' : 500,
            '200000' : 1000},
            fx_step : 'fx-step-2',
             // change this to fx-step-1
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
            setDefaultMoneyBtn: function(){
                const defaultMoneyElement = document.querySelector('.default-money');
                 if (defaultMoneyElement) {
                    defaultMoneyElement.classList.add('active');
                  }
                  defaultMoneyElement.click();
            },
            swiperDefault : function(){
                 swiper[0].slideTo(0);
                 swiper[1].slideTo(0);
                 swiper[2].slideTo(0);
                 // uncomment this if revert money also! this.money = 5000;
                 // set active class for prices
                 if(this.tab == 'tab-1' &&  this.money == 200000 ){
                    this.money = 25000;
                       this.setDefaultMoneyBtn();
                 }
                 if(this.tab == 'tab-2' &&  this.money == 5000 ){
                    this.money = 25000;
                       this.setDefaultMoneyBtn();
                 }



            }


            }" x-init="{ tab: 'tab-1' }">

    <!--    tabs switcher-->
    <div class="crypto-fx-tabs-switcher">
        <!-- Rounded switch -->
        <label class="switch">
            <input type="checkbox"
                @click="tab = (tab === 'tab-1' ? 'tab-2' : 'tab-1'); toggleFxClass(); swiperDefault();">
            <span class="slider round" x-bind:class="{ 'fx': isFx }">
                <p class="crypto">CRYPTO</p>
                <p class="fx">FX</p>
            </span>
        </label>
    </div>
<!--        <div x-text="formatter(money)"></div>-->
    <!--    PRICES-->
    <div class="prices-container">
        <div x-show="tab === 'tab-1'" class="elementor-button-wrapper prices" @click.prevent="money=5000">
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
            <a class="elementor-button active  default-money elementor-button-link elementor-size-sm elementor-animation-flip"
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
        <!--        200k - only for fx-->
        <div x-show="tab === 'tab-2'" class="elementor-button-wrapper prices" @click.prevent="money=200000">
            <a class="elementor-button elementor-button-link elementor-size-sm elementor-animation-flip"
                href="/app-landing/#contact">
                <span class="elementor-button-content-wrapper">
                    <span class="ui-btn-anim-wrapp"><span class="elementor-button-text">$200,000</span><span
                            class="elementor-button-text">$200,000</span></span>
                </span>
            </a>
        </div>
    </div>
    <!--    steps changer-->
    <div x-show="tab === 'tab-2'" class="fx-steps-buttons-container">
        <div class="elementor-button-wrapper step-btn challenges"
            @click.prevent="fx_step ='fx-step-1'; swiperDefault();">
            <a class="elementor-button elementor-button-link elementor-size-sm elementor-animation-flip"
                href="/app-landing/#contact">
                <span class="elementor-button-content-wrapper">
                    <span class="ui-btn-anim-wrapp"><span class="elementor-button-text">1-STEP-CHALLENGE</span><span
                            class="elementor-button-text">1-STEP-CHALLENGE</span></span>
                </span>
            </a>
        </div>
        <div class="elementor-button-wrapper step-btn challenges"
            @click.prevent="fx_step ='fx-step-2'; swiperDefault();">
            <a class="elementor-button active elementor-button-link elementor-size-sm elementor-animation-flip"
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
                            <li class="header">Step 1</li>
                            <li class="profit-target" x-html="'Profit Target <br> <strong>' + formatter((money*0.10 + (money)))"></li>
                            <li class="max-daily-loss">Max Daily Loss <br> <strong>5%</strong></li>
                            <li class="max-drawdown" x-html="'Max Drawdown <br><strong>' + formatter((money*0.08) )"></li>
                            <li class="leverage" >Leverage<br><strong>Up to 30%</strong></li>
                            <li class="refundable-fee" x-html="'Refundable fee <br><strong>' + formatter(refundable_fee[money]) ">Refundable
                                Fee</li>
                        </ul>
                    </div>
                    <div class="columns swiper-slide">
                        <ul class="price">
                            <li class="header">Step 2</li>
                            <li class="profit-target" x-html="'Profit Target <br><strong>' + formatter((money*0.05 + (money)))"></li>
                            <li class="max-daily-loss" >Max Daily Loss <br> <strong>5%</strong></li>
                            <li class="max-drawdown" x-html="'Max Drawdown  <br><strong>' + formatter((money*0.08)) "></li>
                            <li class="leverage">Leverage<br><strong>Up to 30%</strong></li>
                            <li class="refundable-fee" x-html="'Refundable fee <br><strong> N/A'">Refundable Fee</li>
                        </ul>
                    </div>
                    <div class="columns swiper-slide">
                        <ul class="price">
                            <li class="header">Funded Account</li>
                            <li class="profit-target" x-html="'Profit Target <br><strong>$' + (money*0)"></li>
                            <li class="max-daily-loss">Max Daily Loss <br> <strong>5%</strong></li>
                            <li class="max-drawdown" x-html="'Max Drawdown  <br><strong>' + formatter((money*0.08)) "></li>
                            <li class="leverage">Leverage<br><strong>Up to 30%</strong></li>
                            <li class="refundable-fee" x-html="'Refundable fee <br><strong> 100%'">Refundable Fee</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div x-show="tab === 'tab-2'" class="tab-2" init="false">
            <!--          1 step-->
            <div class="swiper">
                <div x-show="fx_step === 'fx-step-1'" class="columns-wrapper  swiper-wrapper fx-steps1">
                    <div class="columns cols-50 swiper-slide">
                        <ul class="price">
                            <li class="header">Step 1</li>
                            <li class="profit-target" x-html="'Profit Target <br> <strong>' + formatter((money*0.08 + (money)))"></li>
                            <li class="max-daily-loss">Max Daily Loss <br> <strong>4%</strong></li>
                            <li class="max-drawdown" x-html="'Max Drawdown <br><strong>' + formatter((money*0.06) )"></li>
                            <li class="leverage">Leverage<br><strong>Up to 100x</strong></li>
                            <li class="refundable-fee"
                                x-html="'Refundable fee <br><strong>' + formatter(refundable_fee_fx[money]+refundable_fee_fx[money]*0.10)">
                                Refundable Fee</li>
                        </ul>
                    </div>
                    <div class="columns cols-50 swiper-slide">
                        <ul class="price">
                            <li class="header">Funded Account</li>
                            <li class="profit-target" x-html="'Profit Target <br><strong>$' + (money*0)"></li>
                            <li class="max-daily-loss">Max Daily Loss <br> <strong>4%</strong></li>
                            <li class="max-drawdown" x-html="'Max Drawdown  <br><strong>' + formatter((money*0.06)) "></li>
                            <li class="leverage">Leverage<br><strong>Up to 100x</strong></li>
                            <li class="refundable-fee" x-html="'Refundable fee <br><strong> 100%'">Refundable Fee</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--            2 step-->
            <div class="swiper">
                <div x-show="fx_step === 'fx-step-2'" class="columns-wrapper  swiper-wrapper fx-step2">
                    <div class="columns swiper-slide">
                        <ul class="price">
                            <li class="header">Step 1</li>
                            <li class="profit-target" x-html="'Profit Target <br> <strong>' + formatter((money*0.08 + (money)))"></li>
                            <li class="max-daily-loss">Max Daily Loss <br> <strong>5%</strong></li>
                            <li class="max-drawdown" x-html="'Max Drawdown  <br><strong>' + formatter((money*0.10) )"></li>
                            <li class="leverage">Leverage<br><strong>Up to 100x</strong></li>
                            <li class="refundable-fee" x-html="'Refundable fee <br><strong>' + formatter(refundable_fee_fx[money])">Refundable
                                Fee</li>
                        </ul>
                    </div>
                    <div class="columns swiper-slide">
                        <ul class="price">
                            <li class="header">Step 2</li>
                            <li class="profit-target" x-html="'Profit Target <br><strong>' + formatter((money*0.05 + (money)))"></li>
                            <li class="max-daily-loss">Max Daily Loss <br> <strong>5%</strong></li>
                            <li class="max-drawdown" x-html="'Max Drawdown  <br><strong>' + formatter((money*0.10)) "></li>
                            <li class="leverage">Leverage<br><strong>Up to 100x</strong></li>
                            <li class="refundable-fee" x-html="'Refundable fee <br><strong> N/A'">Refundable Fee</li>
                        </ul>
                    </div>
                    <div class="columns swiper-slide">
                        <ul class="price">
                            <li class="header">Funded Account</li>
                            <li class="profit-target" x-html="'Profit Target <br><strong>$' + (money*0)"></li>
                            <li class="max-daily-loss">Max Daily Loss <br> <strong>5%</strong></li>
                            <li class="max-drawdown" x-html="'Max Drawdown  <br><strong>' + formatter((money*0.10)) "></li>
                            <li class="leverage">Leverage<br><strong>Up to 100x</strong></li>
                            <li class="refundable-fee" x-html="'Refundable fee <br><strong> 100%'">Refundable Fee</li>
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

   <div class="tabs-container">
       <div class="tab">
           <div>
               <div class="columns-wrapper">
                   <div class="columns">
                       <div class="cta">
                           <div class="elementor-button-wrapper cta-wrapper">
                               <a class="elementor-button elementor-button-link cta-btn elementor-size-sm elementor-animation-flip"
                                  href="#">
                <span class="elementor-button-content-wrapper">
                    <span class="ui-btn-anim-wrapp"><span class="elementor-button-text">GET FUNDED</span><span
                                class="elementor-button-text">GET FUNDED</span></span>
                </span>
                               </a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>

</section>
<?php

});