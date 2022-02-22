<?php
    //セッションを開始します。
    session_start();
      
    //基本的に以下は、HTMLのフォームから送信ボタンが押された後の処理です。
    //送信ボタンが押されるとurlパラメータに?type=confirmationがつきます。
    //そのURLパラメータを取得できたら、処理に移ります。
      
    //GETでURLを取得
    $url = $_GET["type"];
      
    //$_SESSION["sendkey"]がtrueになっていれば、最後の画面で送信可能に。
    $_SESSION["sendkey"] = "false";
      
    //もし$urlパラメータにconfirmationが入っていたら実行。
    if($url == "confirmation"){
          
        //セッションにポストされたデータを保管。
        $_SESSION["mailarea"] = htmlspecialchars($_POST['mailarea'], ENT_QUOTES);
        $_SESSION["namedata"] = htmlspecialchars($_POST['namedata'], ENT_QUOTES);
        $_SESSION["textboxdata"] = htmlspecialchars($_POST['textboxdata'], ENT_QUOTES);
          
        //エラーがあった時のメッセージが入ります。
        $mailareaErrorMessege = "";
        $namedataErrorMessege = "";
          
        //以下、バリデーションチェックに入ります。
        if(empty($_SESSION["mailarea"])){
            //$_SESSION["mailarea"]が空だったら$mailareaErrorMessegeにエラーメッセージを入力。
            $mailareaErrorMessege = "Email is not filled.";
        }elseif(!preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/iD', $_SESSION["mailarea"])){
            //$_SESSION["mailarea"]の内容がメールアドレスじゃなかったらエラーメッセージを入力。
            $mailareaErrorMessege = "This eamil is wrong.";
        };
          
        if(empty($_SESSION["namedata"])){
            //名前が入力されてなければnamedataErrorMessegeにエラーメッセージを入力。
            $namedataErrorMessege = "Name is not filled.";
        };
          
        if(empty($mailareaErrorMessege)&&empty($namedataErrorMessege)){
            //エラーメッセージが存在しなければ「確認ページ」にリダイレクト。
            header('Location: confirmation.php');
            exit;
        };  
    };
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issei Tsuruta's Self Introduction</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script>
        $(function () {  
            $ ('html,body').animate ( { scrollTop: 0 }, '1'); 
            });

        // $('.uparrow').click(function(){
        //     $("html, body").animate({ scrollTop: 0 }, 600);
        //     return false;
        //     });
    </script>
    <!-- <script>
        $('.uparrow').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            
            return true;
            });
    </script> -->
</head>
<body>
<!------------------------------------------------
	* Header
-------------------------------------------------->
    <header>
        <div class="inner">
            <!-- <div class="forwide"> -->
                <a href="issei.php"><h1>Issei Tsuruta</h1></a>
                <!-- <h1><a href="#issei.php">Issei Tsuruta</a></h1> -->
                <nav>
                    <ul>
                        <a href="#vision" class="vision_nav"><li>Vision</li></a>
                        <!-- <a href="#blogs" class="blogs_nav"><li>Blogs</li></a> -->
                        <a href="#works" class="works_nav"><li>Works</li></a>
                        <!-- <a href="#portfolio" class="portfolio_nav"><li>Portfolio</li></a> -->
                        <a href="#access" class="access_nav"><li>Access</li></a>
                        <a href="#contact" class="contact_nav"><li>Contact</li></a>
                    </ul>
                </nav> 
            <!-- </div>    -->
            <!-- <div class="ham hidden">
                <span class="ham_line ham_line1"></span>
                <span class="ham_line ham_line2"></span>
                <span class="ham_line ham_line3"></span>
            </div> -->
        </div>
</header>
<!------------------------------------------------
	* Mainvisual
-------------------------------------------------->
<section class="mainvisual">
    <div class="inner">
        <h2>Global Engineer<br><span class="upper"><span class="left">ＩＴ</span><span class="right">言語</span></span>
        <br>✕<br><span class="lower"><span class="left">投資</span><span class="right">健康</span></span></h2>
        <!-- <h2>Global Engineer</h2>
        <h2 class="upper">IT</h2><h2>言語</h2>
        <h2 class="lower">投資</h2><h2>健康</h2> -->
    </div>
</section>
<!------------------------------------------------
	* VISION
-------------------------------------------------->
<section class="vision" id="vision">
   <div class="inner">
       <h2>VISION</h2>
       <div class="line"></div>
       <p>
            世界のどこでも通用するスキルを持つエンジニアに。<br>
            世界の多様な人々・文化を深く理解できる語学力を。<br>
            世界のどこでも生きていける金融・経済・投資力を。<br>
            世界を巡り人生を満喫するために健康な体と精神を。<br>
       </p>
   </div>
</section>
<!------------------------------------------------
	* BLOGS
-------------------------------------------------->
<!-- <section class="blogs" id="blogs">
   <div class="inner">
       <h2>BLOGS</h2>
       <div class="line"></div>
       <ul>
           <li><a href="#"><span>2022.2.14</span>xxxxxxxxxxxxxxxxxxx</a></li>
           <li><a href="#"><span>2022.2.13</span>xxxxxxxxxxxxxxxxxxx</a></li>
           <li><a href="#"><span>2022.2.12</span>xxxxxxxxxxxxxxxxxxx</a></li>
           <li><a href="#"><span>2022.2.11</span>xxxxxxxxxxxxxxxxxxx</a></li>
           <li><a href="#"><span>2022.2.10</span>xxxxxxxxxxxxxxxxxxx</a></li>
       </ul>
       <a href="#" class="news-btn">All Articles</a>
   </div>
</section> -->
<!------------------------------------------------
	* WORKS
-------------------------------------------------->
<section class="works" id="works">
   <div class="inner">
       <h2>WORKS</h2>
       <div class="line"></div>
         <!-- <div class="works-box">

            <div class="works-card-wrapper">
                <div class="works-card">
                    <h3>IT</h3>  
                    <img src="img/IT4.jpg" alt="IT">
                </div>
                <div class="works-card">
                    <h3>Languages</h3>
                    <img src="img/languages.jpg" alt="Languages">
                </div>
            </div>

            <div class="works-card-wrapper">
               <div class="works-card">
                   <h3>Investment</h3>
                   <img src="img/investment.jpg" alt="Investment">
               </div>
               <div class="works-card">
                   <h3>Health</h3>
                   <img src="img/vegan.jpg" alt="Health">
               </div>

               </div> 
            </div>
         </div> -->

        <!--Slider-->
        <div class="contents">
            <div class="slides">
                <div class="slide active">
                    <h2>IT</h2>
                    <div class="img">
                        <a href="IT.php"><img src="img/IT4.jpg" alt="IT"></a>
                    </div>
                </div>
                <div class="slide">
                    <h2>Languages</h2>
                    <div class="img">
                    <a href="languages.php"><img src="img/languages.jpg" alt="Languages"></a>
                    </div>
                </div>
                <div class="slide">
                    <h2>Investment</h2>
                    <div class="img">
                        <a href="investment.php"><img src="img/investment.jpg" alt="Investment"></a>
                    </div>
                </div>
                <div class="slide">
                    <h2>Fitness</h2>
                    <div class="img">
                        <a href="fitness.php"><img src="img/fitness.jpg" alt="Fitness"></a>
                    </div>
                </div>
                <div class="slide">
                    <h2>Portfolio</h2>
                    <div class="img">
                        <a href="portfolio.php"><img src="img/portfolio.jpg" alt="Portfolio"></a>
                    </div>
                </div>
            <div class="buttons">
            <div class="button prev">Prev</div>
            <div class="button next">Next</div>
            </div>
        </div>

     </div>
</section>
<!------------------------------------------------
	* Portfolio
-------------------------------------------------->
<!-- <section class="portfolio" id="portfolio">
   <div class="inner">
       <h2>Portfolio</h2>
       <div class="line"></div>
       <div class="contents">
           <a href="portfolio.php"><img src="img/portfolio.jpg" alt="Portfolio" width="100%"></a>
       </div>
    </div>
</section> -->
<!------------------------------------------------
  * ACCESS
-------------------------------------------------->
<section class="access" id="access">
   <div class="inner">
       <h2>ACCESS</h2>
       <div class="line"></div>
       <iframe src="https://www.bing.com/travel/place-information?q=%E3%83%81%E3%82%B3&SID=38e2f1e5-0618-4c70-bef3-c49868232b52&form=PLACAB" width="100%" height="350px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
       <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12926.619811374987!2d139.615100022774!3d35.90646556255685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018c143cc2c5285%3A0x280f665a32e5d413!2z5aSn5a6u6aeF!5e0!3m2!1sja!2sjp!4v1600399700046!5m2!1sja!2sjp" width="100%" height="300px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->
   </div>
</section>
<!------------------------------------------------
  * CONTACT
-------------------------------------------------->
<section class="contact" id="contact">
  <div class="inner">
      <h2>CONTACT</h2>
      <div class="line"></div>
        <!-- <form id="contact-form" action="">
            <label for="form-name">お名前</label>
            <p><input id="form-name" type="text" name="" placeholder="入力してください" required=""></p>
        
            <label for="form-mail">メールアドレス</label>
            <p><input id="form-mail" type="email" name="" placeholder="入力してください" required=""></p>
        
            <label for="form-detail">お問い合わせ内容</label>
            <p><textarea id="form-detail" name="" placeholder="入力してください" required=""></textarea></p>

            <p><button type="submit" class="contact-btn" name="button" value="送信">送信</button></p>
        </form> -->

        <form class="profBox" id="formarea" method="post" action="index.php?type=confirmation">
            <!-- <h1>Email Form</h1> -->
            <dl>
                <dt>Email address*</dt>
                <dd>
                    <div>
                        <input type="text" name="mailarea"  placeholder="issei_tsuruta@global.engineer" class="inputText mailarea"  value="<?php echo $_SESSION["mailarea"]; ?>" />
                        <!--入力を確認する際は、下記に入力内容が表示されます-->
                        <!-- <div class="mailareaConfirmation"></div> -->
                        <!-- ミスがあった際は、下記にエラーが表示されます
                        <div class="missmailbox"></div> -->
                        <!--ミスがあった際は、下記にエラーが表示されます-->
                        <?php if(!empty($mailareaErrorMessege)): ?>
                        <div class="errorbox"><?php echo $mailareaErrorMessege;?></div>
                        <?php endif;?>
                    </div>
                </dd>
            </dl>
            <dl>
                <dt>Name*</dt>
                <dd>
                    <div>
                        <input type="text" name="namedata"  placeholder="ex) Issei Tsuruta" class="inputText namearea" value="<?php echo $_SESSION["namedata"]; ?>" />
                        <!-- <div class="namedataConfirmation"></div> -->
                        <!-- <div class="missnamebox"></div> -->
                        <!--ミスがあった際は、下記にエラーが表示されます-->
                        <?php if(!empty($namedataErrorMessege)): ?>
                        <div class="errorbox"><?php echo $namedataErrorMessege; ?></div>
                        <?php endif;?>
                    </div>
                </dd>
            </dl>
            <dl>
                <dt>Comment</dt>
                <dd>
                    <div>
                        <textarea name="textboxdata" class="textboxdata textboxarea"><?php echo $_SESSION["textboxdata"]; ?></textarea>
                        <div class="textboxdataConfirmation"></div>
                    </div>
                </dd>
            </dl>
            
            <!--入力時にはこちらのボタンが表示されます。-->
            <div class="makesurebox">
                <button class="btnStyle1 submitarea">confirm</button>
            </div>	
            
            <!-- 確認時にはこちらのボタンが表示されます。最初はクラスdelateareaで非表示に。
            <div class="delatearea backandsendbox">
                <button class="btnStyle1 backBtnArea mgb10px">back</button>
                <button class="btnStyle1 sendBtnArea">send</button>
            </div> -->
	    </form>
  </div>
</section>

<div class="uparrow">
    <img src="img/uparrow.png" alt="🔝" width="4%" height="4%">
</div>

<!------------------------------------------------
  * フッター
-------------------------------------------------->
<footer>
   <p><small>@Issei Tsuruta</small></p>
</footer>

<script>
    $('.uparrow').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
            });

    'use strict';

    $(function(){
        // ボタンの変化処理
        function changeButtons(){
            // 現在表示中のスライドのナンバーを取得
            let activeSlideNum = $('.slide').index($('.active'));
            let slideCount =  $('.slide').length
            // 両ボタンを表示
            $('.button').show();

            // 最初のスライドの場合、Prevボタン非表示
            if(activeSlideNum == 0){
            $('.prev').hide();
            // alert(slideCount);
            }else if(activeSlideNum == slideCount - 1){  // 最後のスライドの場合、Nextボタン非表示
            $('.next').hide();
            // alert("last slide");
            }
            // else if(activeSlideNum == $('.slide').length - 2){  
            // alert("third slide");
            // console.log( $('.slide').length);
            // }
            // else if(activeSlideNum == $('.slide').length - 3){  
            // $('.next').hide();
            // alert("second slide");
            // console.log( $('.slide').length);
            // }
        }

        // ボタンの変化処理の実行
        changeButtons();

        // Nextボタンクリックイベント
        $('.next').click(function(){
            // 現在表示中のスライドの要素を取得
            let $activeSlide = $('.active');
            // 現在表示中のスライドを非表示にする
            $activeSlide.removeClass('active');
            // 次のスライドを表示する
            $activeSlide.next().addClass('active');

            // if(activeSlideNum == $('.slide').length - 1){
            //     $activeSlide.removeClass('active');
            //     $activeSlide.next().addClass('active');
            // } else {
            //     $activeSlide.removeClass('active');
            //     $activeSlide.next().addClass('active');
            // }

            // ボタンの変化処理の実行
            changeButtons();
        });
        
        // Prevボタンクリックイベント
        $('.prev').click(function(){
            // 現在表示中のスライドの要素を取得
            let $activeSlide = $('.active');
            // 現在表示中のスライドを非表示にする
            $activeSlide.removeClass('active');
            // 前のスライドを表示する
            $activeSlide.prev().addClass('active');
            // ボタンの変化処理の実行
            changeButtons();
        });

    });
</script>
</body>
</html>

<!-- <script>
$(function () {  
    $ ('html,body').animate ( { scrollTop: 0 }, '1'); });
/usr/bin/bash: wq: command not found
/usr/bin/bash: q: command not found
