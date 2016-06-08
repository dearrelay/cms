myApp.service('SwiperService',
    ['$timeout',
    function ( $timeout) {

        this.GetSwiperSlides = function (swiperThis,num) {

            return new Swiper( swiperThis, {
                nextButton: '.swiper-button-next' + num,
                prevButton: '.swiper-button-prev' + num,
                //paginationClickable: true,
                //slidesPerView: 4,
                //spaceBetween: 15,
                //calculateHeight: true,
                //centeredSlides: true,
                initialSlide: 1,
                pagination: '.swiper-pagination' + num,
                //grabCursor: true,
                //resizeReInit: true,
                observer:true,
                grabCursor: false,
                onSlideChangeStart: function (swiper) {
                    $(swiperThis+' .swiper-slide-prev,.swiper-slide-next,.swiper-slide-active').css("opacity", "1");
                    setTimeout(function() {
                        $(swiperThis +' .swiper-slide-prev').prev().css("opacity", "0.3");
                        $(swiperThis+' .swiper-slide-next').next().css("opacity", "0.3"); 
						
                    },200);
                }
            });
                   
        }
		
		this.GetTwoColumnSwiper = function (swiperThis,num) {

            return new Swiper( swiperThis, {
				nextButton: '.swiper-button-next-bg' + num,
                prevButton: '.swiper-button-prev-bg' + num,
                //paginationClickable: true,
                //slidesPerView: 4,
                //spaceBetween: 15,
                //calculateHeight: true,
                //centeredSlides: true,
                //initialSlide: 1,
                pagination: '#swiper-pagination-bg' + num,
                            slidesPerColumn: 2,
							spaceBetween: 15,
                onSlideChangeStart: function (swiper) {
                    $(swiperThis+' .swiper-slide-prev,.swiper-slide-next,.swiper-slide-active').css("opacity", "1");
                    setTimeout(function() {
                        $(swiperThis +' .swiper-slide-prev').prev().css("opacity", "0.3");
                        $(swiperThis+' .swiper-slide-next').next().css("opacity", "0.3");    
                    },200);
                    
                }
            });
                   
        }
		
		this.GetCastSwiperSlides = function (swiperThis,num) {

            return new Swiper( swiperThis, {
                nextButton: '.swiper-button-next-cast' + num,
                prevButton: '.swiper-button-prev-cast' + num,
                //paginationClickable: true,
                slidesPerView: 7,
                spaceBetween: 15,
                //calculateHeight: true,
                //centeredSlides: true,
                //initialSlide: 1,
                pagination: '.swiper-pagination-cast' + num,
                //grabCursor: true,
                //resizeReInit: true,
                //observer:true,
				
                breakpoints: {
					1920: {
						slidesPerView: 7,
						spaceBetween: 20,
						initialSlide: 2,
						centeredSlides: true,
						slidesOffsetBefore: -25,
						onSlideChangeStart: function (swiper) {
					$(swiperThis+' .swiper-slide-prev,.swiper-slide-next,.swiper-slide-active').css("opacity", "1");
					$(swiperThis+' .swiper-slide-prev').prev().css("opacity", "1");
					$(swiperThis+' .swiper-slide-next').next().css("opacity", "1");
					setTimeout(function() {
                        $(swiperThis +' .swiper-slide-prev').prev().prev().css("opacity", "0.3");
                        $(swiperThis+' .swiper-slide-next').next().next().css("opacity", "0.3");    
                    },200);
				}
					},
					991: {
						slidesPerView: 3,
						spaceBetween: 20,
						initialSlide: 0,
						centeredSlides: false,
						slidesOffsetBefore: 30,
						slidesOffsetAfter: 30
					},
					767: {
						slidesPerView: 2,
						spaceBetween: 5,
						initialSlide: 0,
						centeredSlides: false,
						slidesOffsetBefore: 20,
						slidesOffsetAfter: 20
					}
				}
            });
                   
        }
			this.GetPressSwiperSlides = function (swiperThis,num,index) {

            return new Swiper( swiperThis, {
                nextButton: '.swiper-button-next' + num,
                prevButton: '.swiper-button-prev' + num,
                paginationClickable: true,
                spaceBetween: 0,
				autoHeight: true,
                //calculateHeight: true,
                //centeredSlides: true,
               // initialSlide: index,
		pagination: '.swiper-pagination-press',
                //grabCursor: true,
                //resizeReInit: true,
                //observer:true,
                breakpoints: {
					    1920: {
		                slidesPerView: 1,
		                spaceBetween: 0,
		                initialSlide: index,
		                centeredSlides: true,
		                slidesOffsetBefore: 0,
                        width:760
		            },
		            991: {
		                slidesPerView: 1,
		                spaceBetween: 0,
		                initialSlide: index,
		                centeredSlides: true,
                        width:760
		            },
					767: {
						slidesPerView: 1,
						initialSlide: index,
						centeredSlides: true,
						slidesOffsetBefore: 0,
						spaceBetween: 0,
						slidesOffsetAfter: 0,
						paginationClickable: true,
						width: screen.width
					}
				}
                
            });       
        }
		this.GetRatingSwiperSlides = function (swiperThis,num) {
		
            return new Swiper( swiperThis, {
                nextButton: '.swiper-button-next' + num,
                prevButton: '.swiper-button-prev' + num,
                paginationClickable: true,
                spaceBetween: 0,
                //calculateHeight: true,
                //centeredSlides: true,
                //initialSlide: 1,
                //grabCursor: true,
                //resizeReInit: true,
                //observer:true,
                breakpoints: {
					    1920: {
		                slidesPerView: 1,
		                spaceBetween: 0,
		                initialSlide: 0,
		                centeredSlides: true,
		                slidesOffsetBefore: 0,
                        width:760
		            },
		            991: {
		                slidesPerView: 1,
		                spaceBetween: 0,
		                initialSlide: 0,
		                centeredSlides: true,
		                freeMode: true,
                        width:760
		            },
					768: {
						slidesPerView: 1,
						initialSlide: 0,
						centeredSlides: true,
						slidesOffsetBefore: -20,
						spaceBetween: 0,
						slidesOffsetAfter: 0,
						paginationClickable: true,
						width: screen.width
					}
				}
                
            });       
        }
	this.GetStatisticsSwiperSlides = function (swiperThis,num) {
				return new Swiper( swiperThis, {
					nextButton: '.swiper-button-next' + num,
					prevButton: '.swiper-button-prev' + num,
					pagination: '.swiper-pagination' + num,
					paginationClickable: true,
					spaceBetween: 0,
					slidesOffsetBefore: 0,
					breakpoints: {
					768: {
						slidesPerView: 1,
						initialSlide: 0,
						centeredSlides: true,
						slidesOffsetBefore: -20,
						spaceBetween: 0,
						slidesOffsetAfter: 0,
                        width:screen.width
					}
				}
            });
		}
		this.GetSingleSwiperSlide = function (swiperThis) {
		
				return new Swiper( swiperThis, {
					pagination: '.swiper-pagination-header',
					paginationClickable: true,
					spaceBetween: 0,
					slidesOffsetBefore: 0,
					breakpoints: {
					767: {
						slidesPerView: 1,
						initialSlide: 0,
						centeredSlides: true,
						slidesOffsetBefore: 0,
						spaceBetween: 0,
						slidesOffsetAfter: 0,
                        width:screen.width
					}
				}
            });
		}

		this.GetDynamicSlides = function (swiperThis, num) {
	
		    return new Swiper(swiperThis, {
		        nextButton: '.swiper-button-next',
		        prevButton: '.swiper-button-prev',
		        paginationClickable: true,
		       // slidesPerView: 1,
		        //spaceBetween: 15,
		        //calculateHeight: true,
		        //centeredSlides: true,
		        //initialSlide: 1,
		        //grabCursor: true,
		        //resizeReInit: true,
		        pagination: '.swiper-pagination',
		        observer: true,
				onInit: function (swiper) {
                    $(swiperThis+' .swiper-slide-prev,.swiper-slide-next,.swiper-slide-active').css("opacity", "1");
                    setTimeout(function() {
                        $(swiperThis +' .swiper-slide-prev').prev().css("opacity", "0.3");
                        $(swiperThis+' .swiper-slide-next').next().css("opacity", "0.3"); 
						
                    },200);
                },
		        onSlideChangeStart: function (swiper) {
		            $(swiperThis + ' .swiper-slide-prev,.swiper-slide-next,.swiper-slide-active').css("opacity", "1");
		            setTimeout(function() {
                        $(swiperThis +' .swiper-slide-prev').prev().css("opacity", "0.3");
                        $(swiperThis+' .swiper-slide-next').next().css("opacity", "0.3");    
                    },200);
		        },
				 breakpoints: {
               
                991: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                    initialSlide: 0,
                    centeredSlides: false,
                    slidesOffsetBefore: 30,
                    slidesOffsetAfter: 30,
                    freeMode: true
                }
            },
		    });

		}

		this.GetBrowseGallerySlides = function (swiperThis, index) {
	
		    return new Swiper(swiperThis, {
		        nextButton: '.swiper-button-next',
		        prevButton: '.swiper-button-prev',
		        pagination: '.swiper-pagination1',
		        observer: true,
		        onSlideChangeStart: function (swiper) {
		            $(swiperThis + ' .swiper-slide-prev,.swiper-slide-next,.swiper-slide-active').css("opacity", "1");
		            setTimeout(function() {
                        $(swiperThis +' .swiper-slide-prev').prev().css("opacity", "0.3");
                        $(swiperThis+' .swiper-slide-next').next().css("opacity", "0.3");    
                    },200);
		        },
		        breakpoints: {
		            1920: {
		                slidesPerView: 1,
		                spaceBetween: 0,
		                initialSlide: index,
		                centeredSlides: true,
		                slidesOffsetBefore: 0,
                        width:760
		            },
		            991: {
		                slidesPerView: 1,
		                spaceBetween: 0,
		                initialSlide: index,
		                centeredSlides: true,
		                freeMode: true,
                        width:760
		            }
		        }
		    });

		}

		this.GetBrowseGallerySwiper = function () {
		
		    return new Swiper('.browseGallerySwiper', {
		        nextButton: '.swiper-button-next-bg1',
		        prevButton: '.swiper-button-prev-bg1',
		        paginationClickable: true,
		        resizeReInit: true,
		        observer: true,
		        observeParents: true,
		        slidesPerView: 4,
		        spaceBetween: 15,
		        slidesPerColumn: 2,
		        calculateHeight: true,
		        centeredSlides: true,
		        initialSlide: 1,
		        pagination: '.swiper-pagination-bg1',
		        breakpoints: {
		            1920: {
		                slidesPerView: 4,
		                spaceBetween: 15,
		                initialSlide: 1,
		                slidesPerColumn: 2,
		                centeredSlides: true,
		                slidesOffsetBefore: 0
		            },
		            991: {
		                slidesPerView: 2,
		                spaceBetween: 20,
		                initialSlide: 0,
		                slidesPerColumn: 2,
		                centeredSlides: false,
		                slidesOffsetBefore: 30,
		                slidesOffsetAfter: 30
		            },
		            767: {
		                slidesPerView: 1,
		                spaceBetween: 5,
		                initialSlide: 0,
		                slidesPerColumn: 1,
		                centeredSlides: false,
		                slidesOffsetBefore: 20,
		                slidesOffsetAfter: 20
		            }
		        }
		    });
		}

    }])