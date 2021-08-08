<header class="masthead" style="background-image: url('/public/images/russia.jpg')"> 
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1><?php echo htmlspecialchars($data['name'], ENT_QUOTES); ?></h1>
                    <span class="subheading">Автор - <?php echo htmlspecialchars($data['author'], ENT_QUOTES); ?></span>
					<span class="subheading">Жанр - <?php echo htmlspecialchars($data['genre'], ENT_QUOTES); ?></span>
					<span class="subheading">Год издания - <?php echo htmlspecialchars($data['year'], ENT_QUOTES); ?></span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <!--<p><?php echo htmlspecialchars($data['year'], ENT_QUOTES); ?></p>-->
			<a href="/public/materials/<?echo $path_book?>" download>Скачать книгу</a>
        </div>
    </div>
</div>