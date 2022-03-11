
<input type="hidden" id="category_id" value="<?php echo $id_cate ?>">
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12" style="margin-top:15px" id="result">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 alert alert-info">
		<h1>Hãy chọn Page câu hỏi đi nào</h1>
	</div>
	<div class="row">
		<div class="col-12" >
			<nav style="text-align: center" aria-label="...">
				<ul class="pagination pagination-lg" id="list_page">
<!--					<li class="page-item disabled">-->
<!--						<a class="page-link" href="#" tabindex="-1">1</a>-->
<!--					</li>-->
<!--					-->
<!--					<li class="page-item"><a class="page-link" href="#">3</a></li>-->
				</ul>
			</nav>

		</div>
	</div>


</div>

<script>
	var id_cate = $(" #category_id ").val();
	$.ajax({
		url: 'https://obscure-springs-06876.herokuapp.com//api/list_page_question/'+id_cate,
		type: 'GET',
		dataType: 'json', // added data type
	}).then(function (res) {
		console.log("RES",res);
		var total_page = res.total_page;
		var str = '';
		for (var i = 1 ; i <= total_page ; i ++){
			str += '<li class="page-item"><a href="https://obscure-springs-06876.herokuapp.com//QuestionGame/'+res.slug_category+'?page='+i+'" class="page-link">'+i+'</a></li>';
		}
		$(" #list_page ").html(str);

	})
</script>
