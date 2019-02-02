<!--Main Menu HTML Code-->

          <nav class="wsmenu clearfix">

                    <ul class="mobile-sub wsmenu-list">

                    <li><a class="fb-xfbml-parse-ignore" target=_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo 'https://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>&amp;src=sdkpreparse"><img src="https://www.treasuremaps.online/360/treasuremap-template-files/sharefb.png"></a></li>

                    <li><a href="#" onclick="alert('&#x3C;iframe width=&#x22;777&#x22; height=&#x22;555&#x22; src=&#x22;<?php echo 'https://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>&#x22; frameborder=&#x22;0&#x22; allowfullscreen&#x3E;&#x3C;/iframe&#x3E;')"><img src="https://www.treasuremaps.online/360/treasuremap-template-files/embed.png"></a></li>

                    <li class="nofeatour"><a href="#" onclick="about()" ><?php if ( is_front_page() ): ?>About Treasure Maps

<?php else: ?>

About Map

<?php endif ?></a></li>               

                      <? if ( is_user_logged_in() ): ?> 

                      <li><a href="#"><i class="fa fa-align-justify"></i>&nbsp;&nbsp;Dashboard <span class="arrow"></span></a>

                      <div class="megamenu clearfix halfmenu">

                      <ul class="col-lg-6 col-md-6 col-xs-12 link-list"">

                      <li><?php 

                        $current_user = wp_get_current_user();



                        if ( ($current_user instanceof WP_User) ) {

                            echo get_avatar( $current_user->user_email, 32 );

                        }



                        ?><br/>

                      <?php

                            $current_user = wp_get_current_user();                      

                            $usename = $current_user->user_login; 

                            global $usename;

                            echo 'Welcome ' . $current_user->user_login . '';

                        ?>

                        </li>



                        <li><a href="#" onclick="hslink('https://www.treasuremaps.online/dashboard')">My Treasures</a>

                        </li>

                        <li><a href="#" onclick="hslink('https://www.treasuremaps.online/my-maps')">My Maps</a>

                        </li>  

                        <li><a href="#" id="click_me" onclick="runhotspot('https://www.treasuremaps.online/add-map')">Make Map</a>

                        </li> 
                        <?php if ( current_user_can('administrator') ): ?>
                        <li><a href="#" id="click_me" onclick="runhotspot('https://treasuremaps.online/submit-360-map/')">Submit 360 Photo</a>

                        </li> 

                        <li><a href="#" id="click_me" onclick="runhotspot('https://treasuremaps.online/add-360-video/')">Submit 360 Video</a>

                        </li>  
                        <? endif; ?>
                        <li>  

                        <a href="#" onclick="hslink('https://www.treasuremaps.online/how-to')">How To Operate Map</a>

                        </li>

                                                <li>  

                        <a href="#" onclick="hslink('https://www.treasuremaps.online/support')">Support</a>

                        </li>

                          </ul></div>

                        </li>    

<? endif; ?>



<? if ( !is_user_logged_in() ): ?>
                        
                        

                      <li><a href="#" onclick="hslink('https://www.treasuremaps.online/login')">Login</a>

                      </li>                    

<? endif; ?>

                    </ul>

          </nav>

  <!--Menu HTML Code--> 