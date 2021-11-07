@extends('master_layout1')
@section('content')

<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">LIÊN HỆ VỚI <strong>CHÚNG TÔI</strong></h2>    			    				    				
					<div id="gmap" class="contact-map">
                    <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.802446509075!2d108.16776031416994!3d16.075738143535073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314218e6e72e66f5%3A0x46619a0e2d55370a!2zMTM3IE5ndXnhu4VuIFRo4buLIFRo4bqtcCwgVGhhbmggS2jDqiBUw6J5LCBMacOqbiBDaGnhu4N1LCDEkMOgIE7hurVuZywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1607322462260!5m2!1svi!2s"
                        width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                     </div>
					</div>
				</div>			 		
			</div>    	<br>
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h4 class="title" style="color:#FE980F;">Mọi ý kiến đóng góp xin vui lòng điền vào biểu mẫu bên dưới: </h4><br>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form action="" id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				            @csrf
                            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required="required" placeholder="Họ và tên">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="content" id="message" required="required" class="form-control" rows="8" placeholder="Nội dung"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="GỬI">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h4  class="title text-center" style="color:#FE980F;">THÔNG TIN LIÊN HỆ</h4><br>
	    				<address>
	    					<p>Trụ sở chính: 222 Đống Đa</p><br>
							<p>Số điện thoại: 0909009009</p><br>
							<p>Email: bigshoes@gmail.com</p><br>
							<p>Giờ mở cửa: Thứ 2 – Chủ nhật <br> 6AM – 8:00 PM</p><br>
							<p>Fax: 1-714-252-0026</p>
	    				</address>
	    				
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->

    @endsection