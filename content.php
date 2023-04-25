<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */
wp_enqueue_script( 'contentpageJs',get_theme_file_uri() . '/template-parts/js/content.js', 'array(jquery)', '', true);
global $wpdb;
$apply_query = "SELECT * FROM {$wpdb->prefix}application_info WHERE is_checked != 0";
$apply_data = $wpdb->get_results($apply_query);
$consulting_query = "SELECT user_name, title, reg_date, ext1, ext2, ext3 FROM mb_main_consulting WHERE ext3 IN ('', 'Y')";
$consulting_data = $wpdb->get_results($consulting_query);
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

<!-- main banner -->

    <section class="main_banner"> 
        <div class="main_banner_wrap">
            <div class="banner_slide"><img src='http://bempa111222.gabia.io/wp-content/themes/child/img/banner_1.png'></div>
            <div class="banner_slide"><img src='http://bempa111222.gabia.io/wp-content/themes/child/img/banner_2.png'></div>
            <div class="banner_slide"><img src='http://bempa111222.gabia.io/wp-content/themes/child/img/banner_3.png'></div>
            <div class="banner_slide"><img src='http://bempa111222.gabia.io/wp-content/themes/child/img/banner_4.png'></div>
            <div class="banner_slide"><img src='http://bempa111222.gabia.io/wp-content/themes/child/img/banner_5.png'></div>
        </div>
    </section>

    <!-- main board -->
    <section class="main_board">
        <div class="main_board_contain inner_wrap">
            <div class="board_dispaly">
                <div class="board_support">
                    <h3>지원금 상담 현황</h3>
                    <div class="support_table">
                        <ul class="support_table_wrap table_head">
                            <li>접수일</li>
                            <li>이름</li>
                            <li>신청현황</li>
                        </ul>
                        <div class="support_table_td">
                        <?php 
                            foreach($apply_data as $val) { 
                              $apply_date = explode(" ", $val->apply_date);                         
                            ?>
                              <ul class="support_table_wrap">
                                    <li><?php echo $apply_date[0]?></li>
                                    <li><?php echo $val->apply_name?></li>
                                    <li class="<?php echo $val->is_completed ? 'support compleation' : 'support stay'?>"><p><?php echo $val->is_completed ? '접수완료' : '접수대기'?></p></li>
                                </ul>
                        <?php }
                        ?>
                        </div>
                    </div>
                </div>
                <div class="board_support gift">
                    <div class="more_wrap">
                        <h3>사은품 지급 현황</h3>
                        <div class="more_btn">
                            <div class="more_p">더보기</div>
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                    </div>
    
                    <div class="support_table ">
                        <ul class="support_table_wrap table_head" >
                            <li>접수일</li>
                            <li>이름</li>
                            <li>신청현황</li>
                            <li>사은품</li>
                        </ul>
                        <div class="support_table_td">
                            <?php 
                                foreach($consulting_data as $data) { 
                                    $reg_date = explode(" ", $data->reg_date);                                                             
                                ?>
                                <ul class="support_table_wrap">
                                    <li><?php echo str_replace('-','',$reg_date[0])?></li>
                                    <li><?php echo substr($data->user_name,0,-3).'***'?></li>
                                    <li><?php echo $data->ext1 !== '설치완료' ? '설치대기' : '설치완료'?></li>
                                    <li><?php echo $data->ext1 !== '배송완료' ? '배송예정' : '배송완료'?></li>
                            </ul>
                            <?php }
                            ?>
                        </div>
                    </div>
                </div>
            </div>


            <div class="main_btn">
                <a href="/aplication" class="btn submit-btn">
                    <p>견적 문의하기</p>
                    
                </a>
            </div>
        </div>
    </section>




    <!-- main benefit -->
    <section class="main_benefit">
        <div class="benefit_wrap inner_wrap">
            <h2>통신사 요금 및 사은품 안내</h2>
            <div class="benefit_list">
                <div class="benefit_content_list">
                    <div class="benefit_content sk_line">
                        <div class="company_logo">
                            <img <?php get_img("skbroadband_logo.png") ?>>
                        </div>
                        <div class="company_benefit">
                            최대 <span>130~190만원</span> 혜택
                        </div>
                        <div class="company_benefit_content">
                            vod 업데이트 1등!!
                            <br>OK 캐쉬백 적립 및 T멤버쉽 50% 할인!
                            <br>로보카 폴리, 뽀로로 등
                            <br>어린이 컨텐츠 독점!
                            <br>제휴 카드 할인도 팡팡!
                            <br>유무선 결합할인 혜택!
                            <br>기본지원금 46만 + 결합할인 144만
                            <br>상품권 + 지원금 + 비밀지원금
                        </div>
                        <div class="benefit_btn">
                            <button class="btn detail_btn">자세히 보기</button>
                            <button class="btn calulate_btn">월요금 계산기</button>
                        </div>
                    </div>
                    <div class="benefit_content kt_line">
                        <div class="company_logo">
                            <img <?php get_img("kt_logo.png") ?>>
                        </div>
                        <div class="company_benefit">
                            최대 <span>130~190만원</span> 혜택
                        </div>
                        <div class="company_benefit_content">
                            전국 어디든 설치가능!!
                            <br>인터넷 속도하면 역시 KT 올레!
                            <br>넷플릭스 사용 가능!
                            <br>제휴 카드 할인도 팡팡!
                            <br>유무선 결합할인 혜택!
                            <br>기본지원금 46만 + 결합할인 144만
                            <br>상품권 + 지원금 + 비밀지원금
                        </div>
                        <div class="benefit_btn">
                            <button class="btn detail_btn">자세히 보기</button>
                            <button class="btn calulate_btn">월요금 계산기</button>
                        </div>
                    </div>
                    <div class="benefit_content lg_line">
                        <div class="company_logo">
                            <img <?php get_img("lg_logo.png") ?>>
                        </div>
                        <div class="company_benefit">
                            최대 <span>130~190만원</span> 혜택
                        </div>
                        <div class="company_benefit_content">
                            컨텐츠는 LG 유플러스가 최고!!
                            <br>유튜브 및 넷플릭스 사용 가능!
                            <br>수준 높은 키즈 콘텐츠!
                            <br>아이들 나라!
                            <br>제휴 카드 할인도 팡팡!
                            <br>유무선 결합할인 혜택!
                            <br>기본지원금 46만 + 결합할인 144만
                            <br>상품권 + 지원금 + 비밀지원금
                        </div>
                        <div class="benefit_btn">
                            <button class="btn detail_btn">자세히 보기</button>
                            <button class="btn calulate_btn">월요금 계산기</button>
                        </div>
                    </div>
                </div>

                <div class="benefit_content_list">
                    <div class="benefit_content sk_line">
                        <div class="company_logo">
                            <img <?php get_img("sk_telecom_logo.png") ?>>
                        </div>
                        <div class="company_benefit">
                            최대 <span>130~190만원</span> 혜택
                        </div>
                        <div class="company_benefit_content">
                            vod 업데이트 1등!!
                            <br>OK 캐쉬백 적립 및 T멤버쉽 50% 할인!
                            <br>로보카 폴리, 뽀로로 등
                            <br>어린이 컨텐츠 독점!
                            <br>제휴 카드 할인도 팡팡!
                            <br>유무선 결합할인 혜택!
                            <br>기본지원금 46만 + 결합할인 144만
                            <br>상품권 + 지원금 + 비밀지원금
                        </div>
                        <div class="benefit_btn">
                            <button class="btn detail_btn">자세히 보기</button>
                            <button class="btn calulate_btn">월요금 계산기</button>
                        </div>
                    </div>
                    <div class="benefit_content kt_line">
                        <div class="company_logo">
                            <img <?php get_img("kt_skylife_logo.png") ?>>
                        </div>
                        <div class="company_benefit">
                            최대 <span>130~190만원</span> 혜택
                        </div>
                        <div class="company_benefit_content">
                            전국 어디든 설치가능!!
                            <Br>WAVVE + 왓챠 시청 가능!
                            <Br>이제는 원반설치 아닌
                            <Br>나도 네모난 셋탑박스 설치!
                            <Br>유일무이 요금저렴
                            <Br>KT스카이라이프!
                            <Br>유무선 결합할인 혜택!
                            <Br>기본지원금 46만 + 결합할인 144만
                            <Br>상품권 + 지원금 + 비밀지원금
                        </div>
                        <div class="benefit_btn">
                            <button class="btn detail_btn">자세히 보기</button>
                            <button class="btn calulate_btn">월요금 계산기</button>
                        </div>
                    </div>
                    <div class="benefit_content lg_line">
                        <div class="company_logo">
                            <img <?php get_img("lg_helloVision_logo.png") ?>>
                        </div>
                        <div class="company_benefit">
                            최대 <span>130~190만원</span> 혜택
                        </div>
                        <div class="company_benefit_content">
                            CJ헬로비젼에서 LG헬로비젼 인수!!
                            <Br>CJ헬로 요금 납부하면서
                            <Br>LG상품이 사용가능하다구?
                            <Br>모든 통신사 휴대폰 결합 가능!
                            <Br>특정 지역 설치가능!
                            <Br>유무선 결합할인 혜택!
                            <Br>기본지원금 46만 + 결합할인 144만
                            <Br>빠른문의!
                            <Br>상품권 + 지원금 + 비밀지원금
                        </div>
                        <div class="benefit_btn">
                            <button class="btn detail_btn">자세히 보기</button>
                            <button class="btn calulate_btn">월요금 계산기</button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="main_btn">
                <a href="#" class="btn submit-btn">
                    <p>비밀지원금 문자로 받기 </p>
                    
                </a>
            </div>

            
        </div>
    </section>

        <!-- main difference -->
        <section class="main_difference">
        <div class="difference_wrap inner_wrap">
            <h2><span>인터넷 가입의</span> 모든 것</h2>
            <div class="difference_content">
                <div class="difference_list">
                    <div class="list_icon">
                        <img <?php get_img("laptop.png") ?>>
                    </div>
                    <div class="difference_content_title">
                        인터넷하우스는
                        <br>타 가입처와 다릅니다!
                    </div>
                    <div class="difference_content_sub">
                        믿을 수 있는 
                        <br>공식가입센터로
                        <br>투명한 월요금을 
                        <br>안내해드리고 있습니다
                    </div>
                </div>
    
                <div class="difference_list">
                    <div class="list_icon">
                        <img <?php get_img("people.png") ?>>
                    </div>
                    <div class="difference_content_title">
                        100% 고객만족을
                        <br>책임지는 전문 상담사
                    </div>
                    <div class="difference_content_sub">
                        최적화된 혜택과 
                        <br>신속한 답변으로
                        <br>허위나 과장없이
                        <br>고객만족을 책임집니다
                    </div>
                </div>
    
                <div class="difference_list">
                    <div class="list_icon">
                        <img <?php get_img("handshake.png") ?>>
                    </div>
                    <div class="difference_content_title">
                        고객을 위한
                        <br>양심 설계
                    </div>
                    <div class="difference_content_sub">
                        필요없는 부가서비스
                        <br>NO! 
                        <br>맞춤 가성비 상품과 
                        <br>할인방법을 제시합니다.
                    </div>
                </div>

                <div class="difference_list">
                    <div class="list_icon">
                        <img <?php get_img("cash.png") ?>>
                    </div>
                    <div class="difference_content_title">
                        업계 최고의 사은품
                        <br>당일지급!
                    </div>
                    <div class="difference_content_sub">
                        먹튀걱정 NO! 
                        <br>인터넷 설치시
                        <br>최대한의 지원금을 
                        <br>당일지급해드립니다.
                    </div>
                </div>
            </div>



            
        </div>
    </section>
    
    <!-- certification -->
    <section class="main_certification">
        <div class="certification_wrap inner_wrap">
            <div class="certification_list">
                <div class="list_slide">
                    <div class="slide_img">
                        <img <?php get_img("slide1.jpg") ?>>
                    </div>
                    <div class="slide_img">
                        <img <?php get_img("slide2.jpg") ?>>
                    </div>
                    <div class="slide_img">
                        <img <?php get_img("slide3.jpg") ?>>
                    </div>
                    <div class="slide_img">
                        <img <?php get_img("slide4.jpg") ?>>
                    </div>
                    <div class="slide_img">
                        <img <?php get_img("slide5.jpg") ?>>
                    </div>
                    <div class="slide_img">
                        <img <?php get_img("slide6.jpg") ?>>
                    </div>
                    <div class="slide_img">
                        <img <?php get_img("slide7.jpg") ?>>
                    </div>
                </div>
            </div>
        </div>
    </section>

		</main><!-- .site-main -->
	</div><!-- .content-area -->
        <!-- <div class="quickmenu" style="position: sticky;">
            <div class="card my-4">
                <h5 class="card-header" style="text-align:center; color:#081f5c; font-weight:500; font-size:18px; margin-top:9px">비밀지원금 문자 신청</h5>
                <hr style="width:80%;">
                <div class="card-body">
                    <div class="input-group" style="margin-left:17%;">
                        <input type="text" class="apply_name" placeholder="이름" id="name-input" style="height:20px; width:200px; background-color:darkgray; border-radius:3px; border:none;">
                        <input type="text" class="apply_phone" placeholder="연락처" id="phone-input" style="height:20px; width:210px; background-color:darkgray; border-radius:3px; border:none; margin-left:5%">
                        <input type="checkbox" class="check_private_agree" style="height:15px; width:15px; margin-top:8px; margin-left:10%; margin-right:0;">
                        <label style="font-size:10px; margin-right:5px;">개인정보 수집 동의</label>
                        <button style="font-size:10px; margin-right:80px; background-color:white;">내용보기</button>
                        <span class="input-group-btn">
                            <button class="apply_btnh5" type="submit" style="height:25px; background-color: #081f5c; color:white; border:none; border-radius:3px;">신청하기</button>
                        </span>
                    </div>
                </div>
            </div>
        </div> -->

    <div class="top_scroll">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z"/>
        </svg>
    </div>
    <div class="main_bottom_fixed">
        <div class="bottom_wrap">
            <h2 class="title">비밀지원금 문자 신청</h2>
            <div class="message_input">
                <div class="basic_input">
                    <input type="text" class="apply_name" id="name-input" placeholder="이름">
                    <input type="tel" class="apply_phone" id="phone-input" placeholder="연락처">
                </div>

                <div class="personal_chk">
                    <input id="personal_chk"  class="check_private_agree" type="checkbox" value="yes">
                    <label for="personal_chk">개인정보 수집 및 이용에 동의합니다.
                    </label>

                    <div class="personal_popup">
                        내용보기
                    </div>
                </div>

                <button type="submit" class="message_submit apply_btnh5">신청하기</button>
            </div>
        </div>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script> -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- <script src="../../js/main.js"></script> -->
    

    <script>
        $(function() {
            $('.list_slide').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows:false,
                infinite : true, 
            });
        });

        $(function() {
            $('.main_banner_wrap').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows:false,
                infinite : true, 
            });
        });


    </script>


