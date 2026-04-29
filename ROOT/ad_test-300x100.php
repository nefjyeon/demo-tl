<?php
/**
 * Created by kamiz on 2024-05-08
 **/
?>
<link rel="stylesheet" href="/assets/js/plugins/splide/splide.min.css">
<style>
	/* 이미지가 커러셀에 맞게 조정되도록 함 */
  .splide:after {
    content:'';
    display:block;
    clear:both;
  }
  .wrap_logo {
    text-align:center;
    width:150px;
    height:100px;
    float:left;
    display:flex;
    justify-content:center;
    align-items:center;
    background:border-box;
  }
  .wrap_logo>img {
    width:76%;
    height:auto;
  }
  /* 1em = 16px */
  .splide__arrow--prev {
    left:164px;
  }
  .splide__track {
    width:calc( 100% - 150px );
    margin-left:150px;
    background:border-box;
  }
  /* 화살 공통 */
  .splide__arrow {
    opacity:1;
    background-color:rgba(204, 204, 204, .7);
    top: 50%;
  }
  .splide__arrow svg {
    fill:#fff;
  }

	.splide__slide .img_ltr {
		height: 100%;
		object-fit: cover
	}

	.splide__slide .img_ttb {
		width: 100%;
		object-fit: cover
	}

	.splide__slide.active img {
		border: 1px solid #1c1a1a; /* 보더 색상 및 두께를 조정할 수 있습니다. */
	}
</style>
<section class="splide">
  <div class="wrap_logo">
    <img src="http://dev-www.triplink.kr/assets/images/common/logo_yellowB.png" alt="노랑풍선">
  </div>
	<div class="splide__track">
		<ul class="splide__list" id="goods_list">
			<li class="splide__slide"></li>
		</ul>
	</div>
</section>

<script src="/assets/js/plugins/splide/splide.min.js"></script>
<script>
	class SlideController {
		constructor(tracking_cd, width, height, direction) {
			this.tracking_cd = tracking_cd;
			this.width = width;
			this.height = height;
			this.direction = direction;
		}

		async get_lists() {
			return new Promise((resolve, reject) => {
				const xhr = new XMLHttpRequest();
				xhr.open('GET', '/products/dynamic/get_goods/' + this.tracking_cd, true);
				xhr.send();
				xhr.onload = () => {
					if (xhr.status === 200) {
						const goods = JSON.parse(xhr.responseText);
						resolve(goods);
					} else {
						reject("통신 실패");
					}
				};
			});
		}

		async renderSlide() {
			try {
				const goods = await this.get_lists();

				const ul = document.getElementById('goods_list');
				goods.forEach(good => {
					const li = document.createElement('li');
					li.className = 'splide__slide';

					const a = document.createElement('a');
					a.href = '#';
					a.target = '_blank';

					const img = document.createElement('img');
					img.src = good.ap_goods_image;
					img.alt = good.goods_name;
					img.className = this.direction === 'ltr' ? 'img_ltr' : 'img_ttb';
					a.appendChild(img);
					li.appendChild(a);
					ul.appendChild(li);
				});

				let options = {
					type: 'loop',
					autoWidth: true,
					autoHeight: true,
					heightRatio: 0.15,
					gap: '0.2rem',
					width: parseInt(this.width, 10),    // 최대넓이
					height: parseInt(this.height, 10),    // 높이
					direction: this.direction,
					autoplay: true,
					interval: 2000,    // 자동재생 간격(밀리초),
					arrows: true,
					pagination: false,
					drag: 'free',
					pauseOnHover: true,
					mediaQuery: 'min',
					hover: true,
				};

				let splide = new Splide('.splide', options).mount();

				splide.on('active', function (slide) {
					slide.slide.classList.add('active');
				});

				// 슬라이드가 마우스에서 벗어났을 때 발생하는 이벤트
				splide.on('inactive', function (slide) {
					slide.slide.classList.remove('active');
				});

			} catch (error) {
				console.error(error);
			}
		}
	}

	const slideController = new SlideController("wogpr7", 300, 100, "ltr");
	slideController.renderSlide();

</script>


