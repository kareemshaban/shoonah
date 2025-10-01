<!DOCTYPE html>
<html lang="en">

@include('layouts.head_front')

<body class="animsition">

<!-- Header -->
@include('layouts.nav_front' , ['slag' => -1])




<div class="sec-banner bg0 p-t-80 p-b-50">




<!-- Product -->
@include('layouts.products_section' , ['slag' => 6])


</div>


<!-- Footer -->
@include('layouts.footer_design_front')


<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>

<!-- Modal1 -->

<script>
    function scrollSlider(direction) {
        const container = document.getElementById('department-scroll');
        const scrollAmount = 320; // adjust based on item width + gap
        container.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
    }
</script>

<!--===============================================================================================-->

@include('layouts.footer_front')
</body>
</html>
