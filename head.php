<?php header("Location: http://wellup.kr/"); ?>
<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 
include_once(THEMA_PATH.'/assets/thema.php');
?>
 <script>
$(document).ready(function(){
  $(function() {  
        switch (window.location.pathname) {
        case '/shop/list.php':
           $(".at-body").addClass('pd');
           break;
        case '/shop/item.php':
           $(".at-body").addClass('pd');
           break;
        case '/shop/mypage.php':
           $(".at-body").addClass('pd');
           break;
        }
      });
var count = 1;
setInterval(function() {
    count = ($(".slideshow :nth-child("+count+")").fadeOut().next().length == 0) ? 1 : count+1;
    $(".slideshow :nth-child("+count+")").fadeIn();
}, 6000);
});


</script>
<div id="thema_wrapper" class="wrapper <?php echo $is_thema_layout;?> <?php echo $is_thema_font;?>">
	
	<div id="m-bottom-menu"> 
		<ul>
			<li><a href="/"> </a> 홈</li>
			<li><a href="javascript:;" onclick="sidebar_open('sidebar-menu');"> </a>카테고리</li>
			<li><a href="/shop/wishlist.php"></a>위시리스트</li>
			<li><a href="/shop/mypage.php"></a>마이페이지</li>
		</ul>
	</div> <!--mobile bottom menu-->

	<!-- LNB -->
	<aside class="at-lnb" id="header-top">
		<div class="at-container">
			<!-- LNB Left -->
			<div class="pull-left">
				<ul class="none">
					<li><a href="javascript:;" id="favorite">즐겨찾기</a></li>
					<li><a href="<?php echo $at_href['rss'];?>" target="_blank">RSS 구독</a></li>
					<?php
					  $tweek = array("일", "월", "화", "수", "목", "금", "토");
					?>	
					<li><a><?php echo date('m월 d일');?>(<?php echo $tweek[date("w")];?>)</a></li>
				</ul>
				<ul>
						<li class="menu-all-icon">
							<a href="javascript:;" onclick="sidebar_open('sidebar-menu');">
								<i class="fa fa-bars" style="font-size:15px"></i>
							</a>
						</li>
						<li>
							<a href="javascript:;" onclick="sidebar_open('sidebar-response');">
								<i class="fa fa-bell" style="font-size:14px"></i>
								<span class="label bg-orangered en"<?php echo ($member['response'] || $member['memo']) ? '' : ' style="display:none;"';?>>
									<span class="msgCount"><?php echo number_format($member['response'] + $member['memo']);?></span>
								</span>
							</a>
						</li>
				</ul>
			</div>
			<!-- LNB Right -->
			<div class="pull-right">
				<ul>
					<?php if($is_member) { // 로그인 상태 ?>
						<li><a href="javascript:;" onclick="sidebar_open('sidebar-user');"><b><?php echo $member['mb_nick'];?></b></a></li>
						<?php if($member['admin']) {?>
							<li><a href="<?php echo G5_ADMIN_URL;?>">관리</a></li>
						<?php } ?>
						<?php if($member['partner']) { ?>
							<li><a href="<?php echo $at_href['myshop'];?>">마이샵</a></li>
						<?php } ?>
						<li class="sidebarLabel"<?php echo ($member['response'] || $member['memo']) ? '' : ' style="display:none;"';?>>
							<a href="javascript:;" onclick="sidebar_open('sidebar-response');"> 
								알림 <b class="orangered sidebarCount"><?php echo $member['response'] + $member['memo'];?></b>
							</a>
						</li>
					<?php } else { // 로그아웃 상태 ?>
						<li><a href="<?php echo $at_href['login'];?>" onclick="sidebar_open('sidebar-user'); return false;">로그인</a></li>
						<li><a href="<?php echo $at_href['reg'];?>">회원가입</a></li>
						<li class="none"><a href="<?php echo $at_href['lost'];?>" class="win_password_lost">정보찾기	</a></li>
					<?php } ?>
					<?php if(IS_YC) { // 영카트 사용하면 ?>
						<?php if($member['cart'] || $member['today']) { ?>
							<li class="none">
								<a href="<?php echo $at_href['cart'];?>" onclick="sidebar_open('sidebar-cart'); return false;"> 
									쇼핑 <b class="blue"><?php echo number_format($member['cart'] + $member['today']);?></b>
								</a>
							</li>
						<?php } ?>
						<li class="none"><a href="<?php echo $at_href['change'];?>"><?php echo (IS_SHOP) ? '커뮤니티' : '쇼핑몰';?></a></li>
					<?php } ?>
					<li class="none"><a href="<?php echo $at_href['connect'];?>">접속 <?php echo number_format($stats['now_total']); ?><?php echo ($stats['now_mb']) ? ' (<b class="orangered">'.number_format($stats['now_mb']).'</b>)' : ''; ?></a></li>
					<?php if($is_member) { ?>
						<li><a href="<?php echo $at_href['logout'];?>">로그아웃	</a></li>
					<?php } ?>
						<?php if(IS_YC) { //영카트 ?>
						<li class="nav-show">
							<a href="<?php echo $at_href['cart'];?>"> 
								<i class="fa fa-shopping-bag" style="font-size:14px"></i>
								<?php if($member['cart'] || $member['today']) { ?>
									<span class="label bg-green en">
										<?php echo number_format($member['cart'] + $member['today']);?>
									</span>
								<?php } ?>
							</a>
						</li>
					<?php } ?>
					<li>
						<a href="/shop/orderinquiry.php">
						<i class="fa fa-truck" style="font-size:14px"></i>
						</a>
					</li>
					<li>
						<a href="javascript:;" onclick="sidebar_open('sidebar-search');">
							<i class="fa fa-search" style="font-size:14px"></i>
						</a>
					</li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</aside>

	<!-- PC Header -->
	<header class="pc-header">
		<div class="at-container">
			<!-- PC Logo -->
			<div class="header-logo">
                            <a href="<?php echo $at_href['home'];?>" class="slideshow">
				 
					 <img src="https://wellup.kr/img/logo.png"> 
                                         <img src="https://wellup.kr/img/logo_k.png"> 
				</a>
 
			</div>
			<!-- PC Search -->
			<div class="header-search">
				<form name="tsearch" method="get" onsubmit="return tsearch_submit(this);" role="form" class="form">
				<input type="hidden" name="url"	value="<?php echo (IS_YC) ? $at_href['isearch'] : $at_href['search'];?>">
					<div class="input-group input-group-sm">
						<input type="text" name="stx" class="form-control input-sm" value="<?php echo $stx;?>">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-sm"><i class="fa fa-search fa-lg"></i></button>
						</span>
					</div>
				</form>
				<div class="header-keyword">
					<?php echo apms_widget('basic-keyword', 'basic-keyword', 'q=베이직테마,아미나빌더,그누보드,영카트'); // 키워드 ?>
				</div>
			</div>
			<div class="clearfix"></div>
                        <div id="header-banner"> <a href="http://wellup.kr/bbs/page.php?hid=intro"><img src="https://wellup.kr/img/95216fc52671487f.jpg"> </a></div>
			<div id="header-ico">
				<ul>
					<?php if(IS_YC) { //영카트 ?>
							<li class="nav-show">
								<a href="<?php echo $at_href['cart'];?>" onclick="sidebar_open('sidebar-cart'); return false;"> 
						<i class="fa fa-shopping-bag"></i>
						<?php if($member['cart'] || $member['today']) { ?>
							<span class="label bg-green en item-num">
								<?php echo number_format($member['cart'] + $member['today']);?>
							</span>
						<?php } ?>
					</a>
							</li>
						<?php } ?>
					<li><a href="/shop/orderinquiry.php"> <i class="fa fa-truck"></i></a>	</li>
					<li><a href="/shop/mypage.php"> <i class="fa fa-user"></i></a>	</li>
				</ul>
			</div>
		</div>
	</header>

	<!-- Mobile Header -->
	<header class="m-header">
		<div class="at-container">
			<div class="header-wrap">
			<div id="header-banner"> <a href="http://wellup.kr/bbs/page.php?hid=intro"><img src="https://wellup.kr/img/95216fc52671487f.jpg"> </a></div>
				<div class="header-icon">
					<a href="javascript:;" onclick="sidebar_open('sidebar-menu');"><i class="fa fa-bars"></i></a>
				</div>
				<div class="header-logo en">
					<!-- Mobile Logo -->
					<a href="<?php echo $at_href['home'];?>" class="slideshow">
						<img src="https://wellup.kr/img/logo.png" >
                                                <img src="https://wellup.kr/img/logo_k.png">
					</a>
				</div>
				<div class="header-icon">
					<a href="<?php echo $at_href['cart'];?>" onclick="sidebar_open('sidebar-cart'); return false;"> 
						<i class="fa fa-shopping-bag"></i>
						<?php if($member['cart'] || $member['today']) { ?>
							<span class="label bg-green en item-num">
								<?php echo number_format($member['cart'] + $member['today']);?>
							</span>
						<?php } ?>
					</a>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</header>

	<!-- Menu -->
	<nav class="at-menu">
		<!-- PC Menu -->
		<div class="pc-menu">
			<!-- Menu Button & Right Icon Menu -->
			<div class="at-container">
				<div class="nav-right nav-rw nav-height">
					<ul>
						 <?php if($is_member) { // 로그인 상태 ?>
						<li><a href="javascript:;" onclick="sidebar_open('sidebar-user');"><b><?php echo $member['mb_nick'];?></b></a></li>
						<?php if($member['admin']) {?>
							<li><a href="<?php echo G5_ADMIN_URL;?>">관리</a></li>
						<?php } ?>
						<?php if($member['partner']) { ?>
							<li><a href="<?php echo $at_href['myshop'];?>">마이샵</a></li>
						<?php } ?>
						<li class="sidebarLabel"<?php echo ($member['response'] || $member['memo']) ? '' : ' style="display:none;"';?>>
							<a href="javascript:;" onclick="sidebar_open('sidebar-response');"> 
								알림 <b class="orangered sidebarCount"><?php echo $member['response'] + $member['memo'];?></b>
							</a>
						</li>
					<?php } else { // 로그아웃 상태 ?>
						<li><a href="<?php echo $at_href['login'];?>" onclick="sidebar_open('sidebar-user'); return false;">로그인</a></li>
						<li><a href="<?php echo $at_href['reg'];?>">회원가입</a></li>
						<li class="none"><a href="<?php echo $at_href['lost'];?>" class="win_password_lost">정보찾기	</a></li>
					<?php } ?>
					<?php if(IS_YC) { // 영카트 사용하면 ?>
						<?php if($member['cart'] || $member['today']) { ?>
							<li class="none">
								<a href="<?php echo $at_href['cart'];?>" onclick="sidebar_open('sidebar-cart'); return false;"> 
									쇼핑 <b class="blue"><?php echo number_format($member['cart'] + $member['today']);?></b>
								</a>
							</li>
						<?php } ?>
						<li class="none"><a href="<?php echo $at_href['change'];?>"><?php echo (IS_SHOP) ? '커뮤니티' : '쇼핑몰';?></a></li>
					<?php } ?>
					<li class="none"><a href="<?php echo $at_href['connect'];?>">접속 <?php echo number_format($stats['now_total']); ?><?php echo ($stats['now_mb']) ? ' (<b class="orangered">'.number_format($stats['now_mb']).'</b>)' : ''; ?></a></li>
					<?php if($is_member) { ?>
						<li><a href="<?php echo $at_href['logout'];?>">로그아웃	</a></li>
					<?php } ?>
						 
						<li><a href="">고객센터</a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
			<?php include_once(THEMA_PATH.'/menu.php');	// 메뉴 불러오기 ?>
			<div class="clearfix"></div>
			<div class="nav-back"></div>
		</div><!-- .pc-menu -->

		<!-- PC All Menu -->
		<div class="pc-menu-all">
			<div id="menu-all" class="collapse">
				<div class="at-container table-responsive">
					<table class="table">
					<tr>
					<?php 
						$az = 0;
						for ($i=1; $i < $menu_cnt; $i++) {

							if(!$menu[$i]['gr_id']) continue;

							// 줄나눔
							if($az && $az%$is_allm == 0) {
								echo '</tr><tr>'.PHP_EOL;
							}
					?>
						<td class="<?php echo $menu[$i]['on'];?>">
							<a class="menu-a" href="<?php echo $menu[$i]['href'];?>"<?php echo $menu[$i]['target'];?>>
								<?php echo $menu[$i]['name'];?>
								<?php if($menu[$i]['new'] == "new") { ?>
									<i class="fa fa-bolt new"></i>
								<?php } ?>
							</a>
							<?php if($menu[$i]['is_sub']) { //Is Sub Menu ?>
								<div class="sub-1div">
									<ul class="sub-1dul">
									<?php for($j=0; $j < count($menu[$i]['sub']); $j++) { ?>

										<?php if($menu[$i]['sub'][$j]['line']) { //구분라인 ?>
											<li class="sub-1line"><a><?php echo $menu[$i]['sub'][$j]['line'];?></a></li>
										<?php } ?>

										<li class="sub-1dli <?php echo $menu[$i]['sub'][$j]['on'];?>">
											<a href="<?php echo $menu[$i]['sub'][$j]['href'];?>" class="sub-1da<?php echo ($menu[$i]['sub'][$j]['is_sub']) ? ' sub-icon' : '';?>"<?php echo $menu[$i]['sub'][$j]['target'];?>>
												<?php echo $menu[$i]['sub'][$j]['name'];?>
												<?php if($menu[$i]['sub'][$j]['new'] == "new") { ?>
													<i class="fa fa-bolt sub-1new"></i>
												<?php } ?>
											</a>
										</li>
									<?php } //for ?>
									</ul>
								</div>
							<?php } ?>
						</td>
					<?php $az++; } //for ?>
					</tr>
					</table>
					<div class="menu-all-btn">
						<div class="btn-group">
							<a class="btn btn-lightgray" href="<?php echo $at_href['main'];?>"><i class="fa fa-home"></i></a>
							<a href="javascript:;" class="btn btn-lightgray" data-toggle="collapse" data-target="#menu-all"><i class="fa fa-times"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div><!-- .pc-menu-all -->

		<!-- Mobile Menu -->
		<div class="m-menu none">
			<?php include_once(THEMA_PATH.'/menu-m.php');	// 메뉴 불러오기 ?>
		</div><!-- .m-menu -->
	</nav><!-- .at-menu -->

	<div class="clearfix"></div>
	
	<?php if($page_title) { // 페이지 타이틀 ?>
		<div class="at-title">
			<div class="at-container">
				<div class="page-title en">
					<strong<?php echo ($bo_table) ? " class=\"cursor\" onclick=\"go_page('".G5_BBS_URL."/board.php?bo_table=".$bo_table."');\"" : "";?>>
						<?php echo $page_title;?>
					</strong>
				</div>
				<?php if($page_desc) { // 페이지 설명글 ?>
					<div class="page-desc hidden-xs">
						<?php echo $page_desc;?>
					</div>
				<?php } ?>
				<div class="clearfix"></div>
			</div>
		</div>
	<?php } ?>

	<div class="at-body">
		<?php if($col_name) { ?>
			<div class="at-container">
			<?php if($col_name == "two") { ?>
				<div class="row at-row">
					<div class="col-md-<?php echo $col_content;?><?php echo ($at_set['side']) ? ' pull-right' : '';?> at-col at-main">		
			<?php } else { ?>
				<div class="at-content">
			<?php } ?>
		<?php } ?>
