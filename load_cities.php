<?php
require_once "config.php";
$state_name = $_POST["state_name"];
$str ='SELECT city.* FROM city,state where state.name ="'.$state_name.'" and state.id=city.state_id';
$result = mysqli_query($link,$str);
?>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["city_name"];?>"><?php echo $row["city_name"];?></option>
<?php
}
?>