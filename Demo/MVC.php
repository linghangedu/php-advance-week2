<?php
//models
class CurrencyConverter {
    public $baseValue = 0;

    private $rates = [
        'AUD' => 1.0,
        'USD' => 1.35,
        'EUR' => 1.48,
        'CNY' => 0.22
    ];

    public function get($currency) {
        if (isset($this->rates[$currency])) {
            $rate = 1/$this->rates[$currency];
            return round($this->baseValue * $rate, 2);
        }
        else return 0;
    }

    public function set($amount, $currency = 'AUD') {
        if (isset($this->rates[$currency])) {
            $this->baseValue = $amount * $this->rates[$currency];
        }
    }

}



//views
class CurrencyConverterView {
    private $converter;
    private $currency;

    public function __construct(CurrencyConverter $converter, $currency) {
        $this->converter = $converter;
        $this->currency = $currency;
    }

    public function output() {
        $html = '<form action="?action=convert" method="post">
					<input name="currency" type="hidden" value="' . $this->currency .'" />
					<label>' . $this->currency .':</label>
					<input name="amount" type="text" value="' . $this->converter->get($this->currency) . '" />
					<input type="submit" value="Convert" />				
				</form>';

        return $html;
    }
}


//controllers
class CurrencyConverterController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function convert($request) {
        if (isset($request['currency']) && isset($request['amount'])) {
            $this->model->set($request['amount'], $request['currency']);
        }
    }
}


//Application initialisation
$model = new CurrencyConverter();
//echo $model->baseValue;
$controller = new CurrencyConverterController($model);
//echo $model->baseValue;
//If one of the forms has been submitted, call the relevant controllers action
if (isset($_GET['action'])) 
    $controller->{$_GET['action']}($_POST);
//echo $model->baseValue;
//var_dump($model);
$audView = new CurrencyConverterView($model, 'AUD');
echo $audView->output();

$usdView = new CurrencyConverterView($model, 'USD');
echo $usdView->output();

$eurView = new CurrencyConverterView($model, 'EUR');
echo $eurView->output();

$cnyView = new CurrencyConverterView($model, 'CNY');
echo $cnyView->output();

?>

