<?php
$m_shop = '';
$m_orderid = '1';
$m_amount = number_format(100, 2, '.', '');
$m_curr = 'USD';
$m_desc = base64_encode('Test');
$m_key = 'Ваш секретный ключ';

$arHash = array(
	$m_shop,
	$m_orderid,
	$m_amount,
	$m_curr,
	$m_desc
);

/*
$arParams = array(
	'success_url' => 'http:///new_success_url',
	//'fail_url' => 'http:///new_fail_url',
	//'status_url' => 'http:///new_status_url',
	'reference' => array(
		'var1' => '1',
		//'var2' => '2',
		//'var3' => '3',
		//'var4' => '4',
		//'var5' => '5',
	),
	//'submerchant' => 'mail.com',
);

$key = md5(''.$m_orderid);

$m_params = @urlencode(base64_encode(openssl_encrypt(json_encode($arParams), 'AES-256-CBC', $key, OPENSSL_RAW_DATA)));

$arHash[] = $m_params;
*/

$arHash[] = $m_key;

$sign = strtoupper(hash('sha256', implode(':', $arHash)));
?>
<form method="post" action="https://payeer.com/merchant/">
<input type="hidden" name="m_shop" value="<?=$m_shop?>">
<input type="hidden" name="m_orderid" value="<?=$m_orderid?>">
<input type="hidden" name="m_amount" value="<?=$m_amount?>">
<input type="hidden" name="m_curr" value="<?=$m_curr?>">
<input type="hidden" name="m_desc" value="<?=$m_desc?>">
<input type="hidden" name="m_sign" value="<?=$sign?>">
<?php /*
<input type="hidden" name="form[ps]" value="2609">
<input type="hidden" name="form[curr[2609]]" value="USD">
*/ ?>
<?php /*
<input type="hidden" name="m_params" value="<?=$m_params?>">
<input type="hidden" name="m_cipher_method" value="AES-256-CBC">
*/ ?>
<input type="submit" name="m_process" value="send" />
</form>


<script id="widget-wfp-script" language="javascript" type="text/javascript" src="https://secure.wayforpay.com/server/pay-widget.js"></script>
<script type="text/javascript">
    var wayforpay = new Wayforpay();
    var pay = function () {
        wayforpay.run({
                merchantAccount : "test_merch_n1",
                merchantDomainName : "antikino.herokuapp.com",
                authorizationType : "SimpleSignature",
                merchantSignature : "flk3409refn54t54t*FNJRET",
                orderReference : "DH783023",
                orderDate : "1415379863",
                amount : "1",
                currency : "USD",
                productName : "Процессор Intel Core i5-4670 3.4GHz",
                productPrice : "1000",
                productCount : "1",
                clientFirstName : "Вася",
                clientLastName : "Васечкин",
                clientEmail : "some@mail.com",
                clientPhone: "380964227431",
		straightWidget: true,
                language: "EN"
            },
            function (response) {
                // on approved             
            },
            function (response) {
                // on declined
            },
            function (response) {
                // on pending or in processing
            }
        );
    }
</script>
 
 
<button type="button" onclick="pay();">Оплатить</button>


<script src='https://oplata.qiwi.com/popup/v1.js'></script>

<script type="text/javascript">
 var pay = function () {
QiwiCheckout.createInvoice({
    publicKey: '5nAq6abtyCz4tcDj89e5w7Y5i524LAFmzrsN6bQTQ3c******',
    amount: 1.23,
    phone: '79123456789',
})
    .then(data => {
        //  data === {
        //    publicKey: '5nAq6abtyCz4tcDj89e5w7Y5i524LAFmzrsN6bQTQ3c******',
        //    amount: 1.23,
        //    phone: '79123456789',
        //  }
    })
    .catch(error => {
        //  error === {
        //      reason: "PAYMENT_FAILED"
        //  }
    });
 }
</script>
 
