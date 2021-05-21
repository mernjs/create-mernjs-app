/*!
 * Simple Font Awesome Icon Picker
 * http://howlthemes.com
 *
 * Originally written by (c) 2016-17 Aumkar Thakur
 * Special Thanks To Deepak Kamat
 * Licensed under the MIT License
 * https://github.com/aumkarthakur/simple-fontawesome-iconpicker/blob/master/LICENSE
 *
 */

jQuery(document).ready(function(){
    jQuery('body').prepend('<div class="howl-iconpicker-outer"><div class="howl-iconpicker-middle"><div class="howl-iconpicker"><div class="howl-closebtn"></div><input type="text" class="srchicons" placeholder="eg:google" /> <div class="iconsholder"></div></div><div class="howl-iconpicker-close">Close</div></div></div>'); // Appending Iconpicker box below input box
    // All FontAwesome Icons Class
    var fontawesomeicon = '500px adjust adn align-center align-justify align-left align-right amazon ambulance anchor android angellist angle-double-down angle-double-left angle-double-right angle-double-up angle-down angle-left angle-right angle-up apple archive area-chart arrow-circle-down arrow-circle-left arrow-circle-o-down arrow-circle-o-left arrow-circle-o-right arrow-circle-o-up arrow-circle-right arrow-circle-up arrow-down arrow-left arrow-right arrows arrows-alt arrows-h arrows-v arrow-up asterisk at backward balance-scale ban bar-chart barcode bars battery-empty battery-full battery-half battery-quarter battery-three-quarters bed beer behance behance-square bell bell-o bell-slash bell-slash-o bicycle binoculars birthday-cake bitbucket bitbucket-square black-tie bold bolt bomb book bookmark bookmark-o briefcase btc bug building building-o bullhorn bullseye bus buysellads calculator calendar calendar-check-o calendar-minus-o calendar-o calendar-plus-o calendar-times-o camera camera-retro car caret-down caret-left caret-right caret-square-o-down caret-square-o-left caret-square-o-right caret-square-o-up caret-up cart-arrow-down cart-plus cc cc-amex cc-diners-club cc-discover cc-jcb cc-mastercard cc-paypal cc-stripe cc-visa certificate chain-broken check check-circle check-circle-o check-square check-square-o chevron-circle-down chevron-circle-left chevron-circle-right chevron-circle-up chevron-down chevron-left chevron-right chevron-up child chrome circle circle-o circle-o-notch circle-thin clipboard clock-o clone cloud cloud-download cloud-upload code code-fork codepen coffee cog cogs columns comment commenting commenting-o comment-o comments comments-o compass compress connectdevelop contao copyright creative-commons credit-card crop crosshairs css3 cube cubes cutlery dashcube database delicious desktop deviantart diamond digg dot-circle-o download dribbble dropbox drupal eject ellipsis-h ellipsis-v empire envelope envelope-o envelope-square eraser eur exchange exclamation exclamation-circle exclamation-triangle expand expeditedssl external-link external-link-square eye eyedropper eye-slash facebook facebook-official facebook-square fast-backward fast-forward fax female fighter-jet file file-archive-o file-audio-o file-code-o file-excel-o file-image-o file-o file-pdf-o file-powerpoint-o files-o file-text file-text-o file-video-o file-word-o film filter fire fire-extinguisher firefox flag flag-checkered flag-o flask flickr floppy-o folder folder-o folder-open folder-open-o font fonticons forumbee forward foursquare frown-o futbol-o gamepad gavel gbp genderless get-pocket gg gg-circle gift git github github-alt github-square git-square glass globe google google-plus google-plus-square google-wallet graduation-cap gratipay hacker-news hand-lizard-o hand-o-down hand-o-left hand-o-right hand-o-up hand-paper-o hand-peace-o hand-pointer-o hand-rock-o hand-scissors-o hand-spock-o hdd-o header headphones heart heartbeat heart-o history home hospital-o hourglass hourglass-end hourglass-half hourglass-o hourglass-start houzz h-square html5 i-cursor ils inbox indent industry info info-circle inr instagram internet-explorer ioxhost italic joomla jpy jsfiddle key keyboard-o krw language laptop lastfm lastfm-square leaf leanpub lemon-o level-down level-up life-ring lightbulb-o line-chart link linkedin linkedin-square linux list list-alt list-ol list-ul location-arrow lock long-arrow-down long-arrow-left long-arrow-right long-arrow-up magic magnet male map map-marker map-o map-pin map-signs mars mars-double mars-stroke mars-stroke-h mars-stroke-v maxcdn meanpath medium medkit meh-o mercury microphone microphone-slash minus minus-circle minus-square minus-square-o mobile money moon-o motorcycle mouse-pointer music neuter newspaper-o object-group object-ungroup odnoklassniki odnoklassniki-square opencart openid opera optin-monster outdent pagelines paint-brush paperclip paper-plane paper-plane-o paragraph pause paw paypal pencil pencil-square pencil-square-o phone phone-square picture-o pie-chart pied-piper pied-piper-alt pinterest pinterest-p pinterest-square plane play play-circle play-circle-o plug plus plus-circle plus-square plus-square-o power-off print puzzle-piece qq qrcode question question-circle quote-left quote-right random rebel recycle reddit reddit-square refresh registered renren repeat reply reply-all retweet road rocket rss rss-square rub safari scissors search search-minus search-plus sellsy server share share-alt share-alt-square share-square share-square-o shield ship shirtsinbulk shopping-cart signal sign-in sign-out simplybuilt sitemap skyatlas skype slack sliders slideshare smile-o sort sort-alpha-asc sort-alpha-desc sort-amount-asc sort-amount-desc sort-asc sort-desc sort-numeric-asc sort-numeric-desc soundcloud space-shuttle spinner spoon spotify square square-o stack-exchange stack-overflow star star-half star-half-o star-o steam steam-square step-backward step-forward stethoscope sticky-note sticky-note-o stop street-view strikethrough stumbleupon stumbleupon-circle subscript subway suitcase sun-o superscript table tablet tachometer tag tags tasks taxi television tencent-weibo terminal text-height text-width th th-large th-list thumbs-down thumbs-o-down thumbs-o-up thumbs-up thumb-tack ticket times times-circle times-circle-o tint toggle-off toggle-on trademark train transgender transgender-alt trash trash-o tree trello tripadvisor trophy truck try tty tumblr tumblr-square twitch twitter twitter-square umbrella underline undo university unlock unlock-alt upload usd user user-md user-plus users user-secret user-times venus venus-double venus-mars viacoin video-camera vimeo vimeo-square vine vk volume-down volume-off volume-up weibo weixin whatsapp wheelchair wifi wikipedia-w windows wordpress wrench xing xing-square yahoo y-combinator yelp youtube youtube-play youtube-square',
        fontawesomeiconArray = fontawesomeicon.split(' '); // creating array
    var fontawesomeicon2 = 'f26e f042 f170 f037 f039 f036 f038 f270 f0f9 f13d f17b f209 f103 f100 f101 f102 f107 f104 f105 f106 f179 f187 f1fe f0ab f0a8 f01a f190 f18e f01b f0a9 f0aa f063 f060 f061 f047 f0b2 f07e f07d f062 f069 f1fa f04a f24e f05e f080 f02a f0c9 f244 f240 f242 f243 f241 f236 f0fc f1b4 f1b5 f0f3 f0a2 f1f6 f1f7 f206 f1e5 f1fd f171 f172 f27e f032 f0e7 f1e2 f02d f02e f097 f0b1 f15a f188 f1ad f0f7 f0a1 f140 f207 f20d f1ec f073 f274 f272 f133 f271 f273 f030 f083 f1b9 f0d7 f0d9 f0da f150 f191 f152 f151 f0d8 f218 f217 f20a f1f3 f24c f1f2 f24b f1f1 f1f4 f1f5 f1f0 f0a3 f127 f00c f058 f05d f14a f046 f13a f137 f138 f139 f078 f053 f054 f077 f1ae f268 f111 f10c f1ce f1db f0ea f017 f24d f0c2 f0ed f0ee f121 f126 f1cb f0f4 f013 f085 f0db f075 f27a f27b f0e5 f086 f0e6 f14e f066 f20e f26d f1f9 f25e f09d f125 f05b f13c f1b2 f1b3 f0f5 f210 f1c0 f1a5 f108 f1bd f219 f1a6 f192 f019 f17d f16b f1a9 f052 f141 f142 f1d1 f0e0 f003 f199 f12d f153 f0ec f12a f06a f071 f065 f23e f08e f14c f06e f1fb f070 f09a f230 f082 f049 f050 f1ac f182 f0fb f15b f1c6 f1c7 f1c9 f1c3 f1c5 f016 f1c1 f1c4 f0c5 f15c f0f6 f1c8 f1c2 f008 f0b0 f06d f134 f269 f024 f11e f11d f0c3 f16e f0c7 f07b f114 f07c f115 f031 f280 f211 f04e f180 f119 f1e3 f11b f0e3 f154 f22d f265 f260 f261 f06b f1d3 f09b f113 f092 f1d2 f000 f0ac f1a0 f0d5 f0d4 f1ee f19d f184 f1d4 f258 f0a7 f0a5 f0a4 f0a6 f256 f25b f25a f255 f257 f259 f0a0 f1dc f025 f004 f21e f08a f1da f015 f0f8 f254 f253 f252 f250 f251 f27c f0fd f13b f246 f20b f01c f03c f275 f129 f05a f156 f16d f26b f208 f033 f1aa f157 f1cc f084 f11c f159 f1ab f109 f202 f203 f06c f212 f094 f149 f148 f1cd f0eb f201 f0c1 f0e1 f08c f17c f03a f022 f0cb f0ca f124 f023 f175 f177 f178 f176 f0d0 f076 f183 f279 f041 f278 f276 f277 f222 f227 f229 f22b f22a f136 f20c f23a f0fa f11a f223 f130 f131 f068 f056 f146 f147 f10b f0d6 f186 f21c f245 f001 f22c f1ea f247 f248 f263 f264 f23d f19b f26a f23c f03b f18c f1fc f0c6 f1d8 f1d9 f1dd f04c f1b0 f1ed f040 f14b f044 f095 f098 f03e f200 f1a7 f1a8 f0d2 f231 f0d3 f072 f04b f144 f01d f1e6 f067 f055 f0fe f196 f011 f02f f12e f1d6 f029 f128 f059 f10d f10e f074 f1d0 f1b8 f1a1 f1a2 f021 f25d f18b f01e f112 f122 f079 f018 f135 f09e f143 f158 f267 f0c4 f002 f010 f00e f213 f233 f064 f1e0 f1e1 f14d f045 f132 f21a f214 f07a f012 f090 f08b f215 f0e8 f216 f17e f198 f1de f1e7 f118 f0dc f15d f15e f160 f161 f0de f0dd f162 f163 f1be f197 f110 f1b1 f1bc f0c8 f096 f18d f16c f005 f089 f123 f006 f1b6 f1b7 f048 f051 f0f1 f249 f24a f04d f21d f0cc f1a4 f1a3 f12c f239 f0f2 f185 f12b f0ce f10a f0e4 f02b f02c f0ae f1ba f26c f1d5 f120 f034 f035 f00a f009 f00b f165 f088 f087 f164 f08d f145 f00d f057 f05c f043 f204 f205 f25c f238 f224 f225 f1f8 f014 f1bb f181 f262 f091 f0d1 f195 f1e4 f173 f174 f1e8 f099 f081 f0e9 f0cd f0e2 f19c f09c f13e f093 f155 f007 f0f0 f234 f0c0 f21b f235 f221 f226 f228 f237 f03d f27d f194 f1ca f189 f027 f026 f028 f18a f1d7 f232 f193 f1eb f266 f17a f19a f0ad f168 f169 f19e f23b f1e9 f167 f16a f166',
        fontawesomeiconArray2 = fontawesomeicon2.split(' '); // creating array

    // This loop will add icons inside BOX
    for (var i = 0; i < fontawesomeiconArray.length; i++) {
        jQuery(".howl-iconpicker .iconsholder").append('<p class="geticonval" data-key="'+fontawesomeiconArray2[i]+'"><i class="fa fa-' + fontawesomeiconArray[i] + '"></i><span>'+fontawesomeiconArray[i]+'</span></p>');
    }

    //Search Box Code Starts
    jQuery(".howl-iconpicker .srchicons").keyup(function() {

        var filter = jQuery(this).val(),
            count = 0;

        jQuery(".howl-iconpicker .geticonval").each(function() {

            if (jQuery(this).text().search(new RegExp(filter, "i")) < 0) {
                jQuery(this).fadeOut();
            } else {
                jQuery(this).show();
                count++;
            }
        });
    }); //Search box code Ends

    //Close button code
    jQuery('.howl-iconpicker-close').click(function(){
        jQuery('.howl-iconpicker-outer').css('display', 'none');
    });

    jQuery(".howl-iconpicker").on("click", function(e){

        e.stopPropagation();
    });

    jQuery('.howl-iconpicker-outer').on('click', function(){
        jQuery('.howl-iconpicker-outer').css('display', 'none');
    });

});

// This function is Heart of this plugin LOL sorry :P
(function(jQuery) {

    jQuery.fn.iconpicker = function(selector) {

        // if user focus on inputbox SHOW iconpicker box
        jQuery(this).focusin(function() {

            jQuery('.howl-iconpicker-outer').css('display', 'flex');
            jQuery('.howl-iconpicker .geticonval').removeClass('selectedicon');
            whichInputClass = jQuery(this).attr('class');
            whichInputId = jQuery(this).attr('id');
            jQuery(".howl-iconpicker .geticonval").on('click', function() {
                var getIconId = jQuery(this).attr('data-key');
                jQuery('.howl-iconpicker .geticonval').removeClass('selectedicon');
                jQuery(this).addClass('selectedicon');
                if ( jQuery(selector).attr('class') == whichInputClass && jQuery(selector).attr('id') == whichInputId) {
                    jQuery(selector).val(getIconId).change();
                }
            });

        });


    }

}(jQuery));
