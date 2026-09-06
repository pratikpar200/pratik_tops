<?php
class OrderHistory {
    private $orders = [];

    // Add a new order
    public function addOrder($id, $amount) {
        $this->orders[] = ["id" => $id, "amount" => $amount];
    }

    // Get all orders
    public function getOrders() {
        return $this->orders;
    }

    // Display all orders
    public function displayOrders() {
        foreach ($this->orders as $order) {
            echo "Order ID: " . $order['id'] . " | Amount: " . $order['amount'] . "<br>";
        }
    }
}

// Test the class
$orderHistory = new OrderHistory();
$orderHistory->addOrder(1, 500);
$orderHistory->addOrder(2, 1200);
$orderHistory->addOrder(3, 750);

$orderHistory->displayOrders();
?>