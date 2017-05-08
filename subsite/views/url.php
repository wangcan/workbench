<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<table border="0">  
    <thead>  
        <tr>  
            <th scope="col">sem模板</th>  
            <th scope="col">团购会</th>  
            <th scope="col">PC推广url</th>  
            <th scope="col">H5推广url</th>  
        </tr>  
    </thead>  
    <tbody>  
        <?php foreach ($subsiteInfos as $subsiteInfo) { ?>
        <tr>  
            <td><?= $subsiteInfo['template_name']; ?></td>
            <td><?= $subsiteInfo['groupon_name']; ?></td>
            <td><?= "<a href='{$subsiteInfo['url']}' target='_blank'>pc推广链接</a>"; ?></td>
            <td><?= "<a href='{$subsiteInfo['url']}&force_mobile=1' target='_blank'>h5推广链接</a>"; ?></td>
        </tr>  
        <?php } ?>
    </tbody>  
</table>
</body>
</html>
