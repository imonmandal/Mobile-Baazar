CREATE DATABASE `mobile_baazar`;
USE `mobile_baazar`;

-- ------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int NOT NULL,
  `user_id` int NOT NULL,
  `item_id` int NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT NULL
);

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`) VALUES
(1, 'Samsung', 'Samsung Galaxy 10', 152.00, './images/products/1.png', '2020-03-28 11:08:57'), -- NOW()
(2, 'Redmi', 'Redmi Note 7', 110.00, './images/products/2.png', '2020-03-28 11:08:57'),
(3, 'Redmi', 'Redmi Note 6', 120.00, './images/products/3.png', '2020-03-28 11:08:57'),
(4, 'Redmi', 'Redmi Note 5', 125.00, './images/products/4.png', '2020-03-28 11:08:57'),
(5, 'Redmi', 'Redmi Note 4', 137.00, './images/products/5.png', '2020-03-28 11:08:57'),
(6, 'Redmi', 'Redmi Note 8', 142.00, './images/products/6.png', '2020-03-28 11:08:57'),
(7, 'Redmi', 'Redmi Note 9', 117.00, './images/products/7.png', '2020-03-28 11:08:57'),
(8, 'Redmi', 'Redmi Note', 122.00, './images/products/8.png', '2020-03-28 11:08:57'),
(9, 'Samsung', 'Samsung Galaxy S6', 163.00, './images/products/9.png', '2020-03-28 11:08:57'),
(10, 'Samsung', 'Samsung Galaxy S7', 147.00, './images/products/10.png', '2020-03-28 11:08:57'),
(11, 'Apple', 'Apple iPhone 5', 160.00, './images/products/11.png', '2020-03-28 11:08:57'),
(12, 'Apple', 'Apple iPhone 6', 155.00, './images/products/12.png', '2020-03-28 11:08:57'),
(13, 'Apple', 'Apple iPhone 7', 150.00, './images/products/13.png', '2020-03-28 11:08:57');


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `register_date` datetime DEFAULT NULL
);

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `register_date`) VALUES
(1, 'Imon', 'Mandal', '2020-03-28 13:07:17'),
(2, 'Akshay', 'Kashyap', '2020-03-28 13:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int NOT NULL,
  `user_id` int NOT NULL,
  `item_id` int NOT NULL
);

--
-- Add primary keys
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT;
COMMIT;

--
-- Add foreign keys
--

-- Foreign key for table cart
--
ALTER TABLE `cart`
ADD FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD FOREIGN KEY (`item_id`) REFERENCES `product`(`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;


-- Foreign key for table wishlist
--
ALTER TABLE `wishlist`
ADD FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD FOREIGN KEY (`item_id`) REFERENCES `product`(`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

TRUNCATE TABLE `cart`;
TRUNCATE TABLE `wishlist`;
