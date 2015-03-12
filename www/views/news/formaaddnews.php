<!doctype html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Добавить новость</title>
</head>
<body>
<h2>Добавить новость</h2>
<form action="/../controllers/AdminController.php" method="post">
    <table>
        <tr>
            <td><label for="title">Заголовок</label></td>
            <td><input type="text" name="title" size="48" id="title"/></td>
        </tr>
        <tr>
            <td><label for="text">Текст</label></td>
            <td><input type="text" name="text" size="48" id="text"/></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Добавить новость"</td>
        </tr>
    </table>
    <div>
        <a href="/../views/all.php"> На главную</a>
    </div>
</body>
</html>