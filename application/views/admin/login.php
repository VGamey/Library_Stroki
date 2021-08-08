<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Вход в панель Администратора</div>
        <div class="card-body">
            <form action="/admin/login" method="post">
                <div class="form-group">
                    <label>Логин</label>
                    <input class="form-control" type="text" name="login" value="admin">
                </div>
                <div class="form-group">
                    <label>Пароль</label>
                    <input class="form-control" type="password" name="password" value="12345">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Вход</button>
            </form>
        </div>
    </div>
</div>