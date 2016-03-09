<?
include_once("User.php");
include_once("Product.php");
//买了产品到底多少钱呢?
class ProductSettle{
    public static function  finalPrice(User $_user, Product $_product, $number = 1){
        $price = $_user->getDiscount() * $_product->getProductPrice() *$number;
        return $price;
    }
}
?>
