-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2024 at 08:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecoeats`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `articleID` int(11) NOT NULL,
  `Title` varchar(400) NOT NULL,
  `publishDate` date NOT NULL,
  `Content` text NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`articleID`, `Title`, `publishDate`, `Content`, `image`) VALUES
(1, '10 Ideas for a Healthy High Fiber Diet', '2024-11-03', 'Dietary fiber or roughage is the portion of plant-derived food that cannot be completely broken down by human digestive enzymes. Dietary fibers are diverse in chemical composition, and can be grouped generally by their solubility, viscosity, and fermentability, which affect how fibers are processed in the body. Dietary fiber has two main components: soluble fiber and insoluble fiber, which are components of plant foods, such as legumes, whole grains and cereals, vegetables, fruits, and nuts or seeds.\r\n\r\nA diet high in regular fiber consumption is generally associated with supporting health and lowering the risk of several diseases. Food sources of dietary fiber have traditionally been divided according to whether they provide soluble or insoluble fiber. Plant foods contain both types of fiber in varying amounts, according to the fiber characteristics of viscosity and fermentability.\r\n\r\nAdvantages of consuming fiber depend upon which type of fiber is consumed and which benefits may result in the gastrointestinal system. Bulking fibers – such as cellulose and hemicellulose (including psyllium) – absorb and hold water, promoting regularity. Viscous fibers – such as beta-glucan and psyllium – thicken the fecal mass. Fermentable fibers – such as resistant starch, xanthan gum, and inulin – feed the bacteria and microbiota of the large intestine, and are metabolized to yield short-chain fatty acids, which have diverse roles in gastrointestinal health. Soluble fiber (fermentable fiber or prebiotic fiber) – which dissolves in water – is generally fermented in the colon into gases and physiologically active by-products, such as short-chain fatty acids produced in the colon by gut bacteria. Examples are beta-glucans (in oats, barley, and mushrooms) and raw guar gum. Psyllium – a soluble, viscous, nonfermented fiber – is a bulking fiber that retains water as it moves through the digestive system, easing defecation.\r\n\r\nSoluble fiber is generally viscous and delays gastric emptying which, in humans, can result in an extended feeling of fullness. Inulin (in chicory root), wheat dextrin, oligosaccharides, and resistant starches (in legumes and bananas), are soluble non-viscous fibers. Regular intake of soluble fibers, such as beta-glucans from oats or barley, has been established to lower blood levels of LDL cholesterol, a risk factor for cardiovascular diseases. Insoluble fiber – which does not dissolve in water – is inert to digestive enzymes in the upper gastrointestinal tract. Examples are wheat bran, cellulose, and lignin. Coarsely ground insoluble fiber triggers the secretion of mucus in the large intestine, providing bulking. Finely ground insoluble fiber does not have this effect and can actually have a constipating effect. Some forms of insoluble fiber, such as resistant starches, can be fermented in the colon. Dietary fiber consists of non-starch polysaccharides and other plant components such as cellulose, resistant starch, resistant dextrins, inulin, lignins, chitins (in fungi), pectins, beta-glucans, and oligosaccharides.', 'images/article2.webp'),
(2, 'Healthy Sweets', '2024-11-03', 'In some parts of the world, such as much of Central Africa and West Africa, and most parts of China, there is no tradition of a dessert course to conclude a meal. The term dessert can apply to many confections, such as biscuits, cakes, cookies, custards, gelatins, ice creams, pastries, pies, puddings, macaroons, sweet soups, tarts, and fruit salad. Fruit is also commonly found in dessert courses because of its naturally occurring sweetness. Some cultures sweeten foods that are more commonly savory to create desserts.\r\n\r\nSweet desserts usually contain cane sugar, palm sugar, brown sugar, honey, or some types of syrup such as molasses, maple syrup, treacle, or corn syrup. Other common ingredients in Western-style desserts are flour or other starches, cooking fats such as butter or lard, dairy, eggs, salt, acidic ingredients such as lemon juice, and spices and other flavoring agents such as chocolate, coffee, peanut butter, fruits, and nuts. The proportions of these ingredients, along with the preparation methods, play a major part in the consistency, texture, and flavor of the end product.\r\n\r\n', 'images/article3.webp');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OrderID` int(11) NOT NULL,
  `OrderDate` date NOT NULL,
  `TotalPrice` double NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OrderID`, `OrderDate`, `TotalPrice`, `userID`) VALUES
(39, '2024-12-13', 4, 9),
(40, '2024-12-13', 4, 9),
(41, '2024-12-13', 4, 9),
(42, '2024-12-13', 15, 9),
(43, '2024-12-13', 27, 9),
(44, '2024-12-13', 15, 9),
(45, '2024-12-13', 11, 9),
(46, '2024-12-13', 48, 9);

-- --------------------------------------------------------

--
-- Table structure for table `orderaddress`
--

CREATE TABLE `orderaddress` (
  `OrderAddressid` int(11) NOT NULL,
  `FirstName` varchar(500) NOT NULL,
  `LastName` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(8) NOT NULL,
  `UserID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderaddress`
--

INSERT INTO `orderaddress` (`OrderAddressid`, `FirstName`, `LastName`, `city`, `address`, `phone`, `UserID`, `orderID`) VALUES
(21, 'faten', 'faten', ' minieh danieh_tripoli', 'Tripoli,street 2 building 1', '70486469', 9, 39),
(22, 'faten', 'faten', ' minieh danieh_tripoli', 'Tripoli,street 2 building 1', '70486469', 9, 40),
(23, 'faten', 'faten', ' minieh danieh_tripoli', 'Tripoli,street 2 building 1', '70486469', 9, 41),
(24, 'rama', 'tobbo', ' minieh danieh_tripoli', 'Tripoli,street 2 building 1', '70486466', 9, 42),
(25, 'fifi', 'faten', ' minieh danieh_tripoli', 'Tripoli,street 2 building 1', '70486469', 9, 43),
(26, 'fifi', 'faten', ' minieh danieh_tripoli', 'Tripoli,street 2 building 1', '70486469', 9, 44),
(27, 'fifi', 'faten', ' minieh danieh_tripoli', 'Tripoli,street 2 building 1', '70486469', 9, 45),
(28, 'rama', 'tobbo', ' minieh danieh_tripoli', 'Tripoli,street 2 building 1', '70486466', 9, 46);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `orderItems_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `orderID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`orderItems_id`, `product_id`, `quantity`, `price`, `orderID`) VALUES
(28, 15, 1, 1, 39),
(29, 15, 1, 1, 40),
(30, 15, 1, 1, 41),
(31, 7, 1, 12, 42),
(32, 7, 2, 24, 43),
(33, 7, 1, 12, 44),
(34, 13, 1, 8, 45),
(35, 11, 9, 45, 46);

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE `productcategory` (
  `Category_id` int(11) NOT NULL,
  `Category_Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`Category_id`, `Category_Name`) VALUES
(1, 'Meat and Poultry'),
(2, 'Vegetables and Fruits'),
(3, 'Dairy'),
(4, 'Baked Goods'),
(5, 'Prepared Foods'),
(6, 'snack'),
(7, 'Baking Supplies');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `Product_Name` varchar(200) NOT NULL,
  `Product_Description` text NOT NULL,
  `AddedDate` date NOT NULL,
  `Quantity` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `ProductImage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_id`, `price`, `Product_Name`, `Product_Description`, `AddedDate`, `Quantity`, `CategoryID`, `ProductImage`) VALUES
(1, 3, 'Chocolate Cookie', 'No added sugar\r\n', '2024-11-02', 28, 4, 'images/cookies.webp'),
(2, 6, 'Keto Crunch', 'Keto friendly combination', '2024-11-02', 300, 6, 'images/keto.webp'),
(3, 10, 'watermelon', 'excelent source of vitamine A', '2024-11-02', 50, 2, 'images/watermelon.webp'),
(4, 2, 'Potato', 'excellent source of vitamine C', '2024-11-02', 500, 2, 'images/potato.webp'),
(5, 5, 'Flour', 'Organic', '2024-11-02', 300, 7, 'images/flour.webp'),
(6, 10, 'Coconut Water', 'Rich taste', '2024-11-02', 30, 3, 'images/coconutwater.webp'),
(7, 12, 'Salad', 'Greek style', '2024-11-02', 38, 5, 'images/salad.webp'),
(8, 3, 'Paprika', 'Organic', '2024-11-02', 500, 2, 'images/paprika.webp'),
(9, 5, 'Mango', 'Organic', '2024-11-02', 200, 2, 'images/mango.webp'),
(10, 2, 'Lemon', 'Rich in vitamine C', '2024-11-02', 500, 2, 'images/lemon.webp'),
(11, 5, 'Baguette', '2 feet long', '2024-11-02', 21, 4, 'images/baguette.webp'),
(12, 3, 'Bread', 'Super crispy', '2024-11-02', 30, 4, 'images/bread1.webp'),
(13, 8, 'Pizza', 'Very healthy', '2024-11-02', 9, 5, 'images/pizza.webp'),
(14, 6, 'Bread Sticks', 'Very crispy', '2024-11-02', 20, 4, 'images/breadsticks.webp'),
(15, 1, 'Eggs', 'Organic', '2024-11-02', 94, 3, 'images/egg.webp'),
(16, 12, 'Cheese', 'Organic', '2024-11-02', 15, 3, 'images/cheese.webp');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_ingredients`
--

CREATE TABLE `recipe_ingredients` (
  `Recipe_Ingredients` int(11) NOT NULL,
  `RecipeID` int(11) NOT NULL,
  `quantity` varchar(500) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `ingredients` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe_ingredients`
--

INSERT INTO `recipe_ingredients` (`Recipe_Ingredients`, `RecipeID`, `quantity`, `unit`, `ingredients`) VALUES
(2, 3, '1', '', 'Big chicken'),
(3, 2, '2', 'tbsp', ''),
(4, 2, '200', 'gram', ''),
(5, 1, '2', 'slice', ''),
(6, 1, '3', 'tbsp', ''),
(7, 3, '1', '', 'Paprika'),
(8, 3, '1', '', ' Cucumbers'),
(9, 3, '1', '', 'Onion'),
(10, 3, '3', 'tbsp', 'Cooking Oil'),
(11, 3, '4', 'tbsp', ' Olive Oil'),
(12, 3, '1', 'cup', 'Balsamic Vinegar'),
(13, 3, '1', 'tbsp', 'Minced Garlic'),
(14, 3, '2', 'tbsp', 'Lemon Juice'),
(15, 3, '2', 'tbsp', 'Ground Cumin'),
(16, 3, '2', 'tsp', ' Dried Oregano'),
(17, 3, '', '', 'Salt & Pepper');

-- --------------------------------------------------------

--
-- Table structure for table `recipies`
--

CREATE TABLE `recipies` (
  `RecipiesID` int(11) NOT NULL,
  `RecipeTitle` varchar(500) NOT NULL,
  `RecipeDescription` text NOT NULL,
  `RecipeImage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipies`
--

INSERT INTO `recipies` (`RecipiesID`, `RecipeTitle`, `RecipeDescription`, `RecipeImage`) VALUES
(1, 'Juicy Beef Sandwitch', 'The origin of the hamburger is unclear, though \"hamburger steak sandwiches\" have been advertised in U.S. newspapers from New York to Hawaii since at least the 1890s. So let\'s make one', 'images/beef.webp'),
(2, 'Chicken With Salads', 'Chicken is sometimes cited as being more healthful than red meat, with lower concentrations of cholesterol and saturated fat', 'images/saladchicken.webp'),
(3, 'Grilled Beef Burger', 'The origin of the hamburger is unclear, though \"hamburger steak sandwiches\" have been advertised in U.S. newspapers from New York to Hawaii since at least the 1890s. So let\'s make one', 'images/burger.webp');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleID` int(11) NOT NULL,
  `roleName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleID`, `roleName`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `steps`
--

CREATE TABLE `steps` (
  `stepId` int(11) NOT NULL,
  `recipeId` int(11) NOT NULL,
  `stepNumber` int(11) NOT NULL,
  `instruction` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `steps`
--

INSERT INTO `steps` (`stepId`, `recipeId`, `stepNumber`, `instruction`) VALUES
(1, 2, 1, 'Dump your ground meat into a bowl. Season it with salt, pepper, and whatever else you want; you can add spices, Worcestershire sauce or chiles'),
(2, 2, 2, 'Shape your burgers into patties. Make your patties a bit bigger than you want them later because the burgers will shrink up a bit once you cook them'),
(3, 2, 3, 'Oil your grill and grill or sear those patties. Cook them until your desired doneness (around 130-145ºF for medium rare, around 1 minute per side for each inch of thickness).'),
(4, 2, 4, 'Add your cheese and toast your buns. Let the cheese melt while the burgers are still on the grill'),
(5, 2, 5, 'Once your burgers are finished cooking and your cheese is melted and your buns are slightly charred, throw some condiments and toppings on those burgers'),
(6, 1, 1, 'Dump your ground meat into a bowl. Season it with salt, pepper, and whatever else you want; you can add spices, Worcestershire sauce or chiles'),
(7, 1, 2, 'Shape your burgers into patties. Make your patties a bit bigger than you want them later because the burgers will shrink up a bit once you cook them'),
(8, 1, 3, 'Oil your grill and grill or sear those patties. Cook them until your desired doneness (around 130-145ºF for medium rare, around 1 minute per side for each inch of thickness).'),
(9, 1, 4, 'Add your cheese and toast your buns. Let the cheese melt while the burgers are still on the grill'),
(10, 1, 5, 'Once your burgers are finished cooking and your cheese is melted and your buns are slightly charred, throw some condiments and toppings on those burgers'),
(11, 3, 1, 'Dump your ground meat into a bowl. Season it with salt, pepper, and whatever else you want; you can add spices, Worcestershire sauce or chiles'),
(12, 3, 2, 'Shape your burgers into patties. Make your patties a bit bigger than you want them later because the burgers will shrink up a bit once you cook them'),
(13, 3, 3, 'Oil your grill and grill or sear those patties. Cook them until your desired doneness (around 130-145ºF for medium rare, around 1 minute per side for each inch of thickness)'),
(14, 3, 4, 'Add your cheese and toast your buns. Let the cheese melt while the burgers are still on the grill'),
(15, 3, 5, 'Once your burgers are finished cooking and your cheese is melted and your buns are slightly charred, throw some condiments and toppings on those burgers');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `RoleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Name`, `email`, `password`, `RoleID`) VALUES
(6, 'Faten', 'faten@gmail.com', '$2y$10$AG456jg34w643P2wwY.vhOg.0DdrGMxP5yoIP/y932B1K6Gig4rt6', 2),
(7, 'RamaTobbo', 'ramatobbo5@gmail.com', '$2y$10$CvNNcb7KREW8QmfqszB5TeqVMReq5l891sL7OX7VJbYYMWePGig7m', 2),
(8, 'Rama1999', 'ramatobbo5@gmail.com', '$2y$10$6ufUuaEiwGZf02Bla0yPXeKSRcQOXPnWSzhopvTrcI4af/zq0bYlC', 2),
(9, 'rama', 'ramatobbo@gmail.com', '$2y$10$ngYNcvkxjddpqHP1fadKs.Ff3hGZMuPctfL9g/Zj.RXJ1oHkPzk9a', 2),
(10, 'Rama', 'rama@gmail.com', '123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`articleID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `orderaddress`
--
ALTER TABLE `orderaddress`
  ADD PRIMARY KEY (`OrderAddressid`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `orderID` (`orderID`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`orderItems_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `orderID` (`orderID`);

--
-- Indexes for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_id`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  ADD PRIMARY KEY (`Recipe_Ingredients`),
  ADD KEY `RecipeID` (`RecipeID`);

--
-- Indexes for table `recipies`
--
ALTER TABLE `recipies`
  ADD PRIMARY KEY (`RecipiesID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `steps`
--
ALTER TABLE `steps`
  ADD PRIMARY KEY (`stepId`),
  ADD KEY `recipieId` (`recipeId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `RoleID` (`RoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `articleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `orderaddress`
--
ALTER TABLE `orderaddress`
  MODIFY `OrderAddressid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `orderItems_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `Category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  MODIFY `Recipe_Ingredients` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `recipies`
--
ALTER TABLE `recipies`
  MODIFY `RecipiesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `steps`
--
ALTER TABLE `steps`
  MODIFY `stepId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `orderaddress`
--
ALTER TABLE `orderaddress`
  ADD CONSTRAINT `orderaddress_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `orderaddress_ibfk_2` FOREIGN KEY (`orderID`) REFERENCES `order` (`OrderID`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`Product_id`),
  ADD CONSTRAINT `order_items_ibfk_3` FOREIGN KEY (`orderID`) REFERENCES `order` (`OrderID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `productcategory` (`Category_id`);

--
-- Constraints for table `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  ADD CONSTRAINT `recipe_ingredients_ibfk_2` FOREIGN KEY (`RecipeID`) REFERENCES `recipies` (`RecipiesID`);

--
-- Constraints for table `steps`
--
ALTER TABLE `steps`
  ADD CONSTRAINT `steps_ibfk_1` FOREIGN KEY (`recipeId`) REFERENCES `recipies` (`RecipiesID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `role` (`roleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
