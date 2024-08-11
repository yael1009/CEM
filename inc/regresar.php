<button class="btn btn-custom">
	<a href="#" class=" btn-back">Regresar</a>
</button>

<script type="text/javascript">
    let btn_back = document.querySelector(".btn-back");

    btn_back.addEventListener('click', function(e){
        e.preventDefault();
        window.history.back();
    });
</script>