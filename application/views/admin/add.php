<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/admin/add" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Название</label>
                                <input class="form-control" type="text" name="name">
                            </div>
							<div class="form-group">
                                <label>Год издания</label>
                                <input class="form-control" type="number" name="year" max="<?php echo date("Y")?>">
                            </div>
                            <div class="form-group">
                                <label>Автор книги</label>
                                <input class="form-control" type="text" name="author">
                            </div>
							<div class="form-group">
                                <label>Жанр книги</label>
                                <input class="form-control" type="text" name="genre" list="list_genre">
								<datalist id="list_genre">
									<option value="фантастика">
									<option value="роман">
									<option value="новелла">
									<option value="приключения">
									<option value="автобиография">
								</datalist>
							</div>
                            <div class="form-group">
                                <label>Книга</label>
                                <input class="form-control" type="file" name="book"> 
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>