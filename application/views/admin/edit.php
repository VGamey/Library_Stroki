<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/admin/edit/<?php echo $data['id']; ?>" method="post" >
                            <div class="form-group">
                                <label>Название</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['name'], ENT_QUOTES); ?>" name="name">
                            </div>
							
                            <div class="form-group">
                                <label>Год издания</label>
                                <input class="form-control" type="number" value="<?php echo htmlspecialchars($data['year'], ENT_QUOTES); ?>" name="year">
                            </div>
							
							<div class="form-group">
                                <label>Автор книги</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['author'], ENT_QUOTES); ?>" name="author">
                            </div>
							
							<div class="form-group">
                                <label>Жанр книги</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['genre'], ENT_QUOTES); ?>" name="genre" list="list_genre">
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
                            <button type="submit" class="btn btn-primary btn-block">Сохранить</button>
                        </form>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>