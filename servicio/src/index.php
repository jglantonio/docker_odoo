

<?php
    //$odo = new OdooRest('127.0.0.1','postgres','myodoo','odoo');
    $db = 'Odoo_example';
    $user = 'odoo';
    $password = '1234';
    require_once('Ripcord/ripcord.php');
    $models = ripcord::client("http://127.0.0.1:8069/xmlrpc/2/common");
    $uid = $models->authenticate($db,$user,$password,[]);
    var_dump($uid);
    /*$models = ripcord::client("http://127.0.0.1:8069/xmlrpc/2/object");
    $info = $models->execute_kw($db, $uid, $password,
        'res.partner',
        'check_access_rights',
        [
            'read'
        ]
        ,
        [
            'raise_exception' => false
        ]
    );

    var_dump($info);*/
?>