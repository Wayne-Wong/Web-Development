<?php
/*
Plugin Name: Options Provider
Description: A plugin for users to provide custom options to their customers
Author: Ching Kwan Yeung
*/
/* Runs when plugin is activated */
register_activation_hook(__FILE__,'create_option_table'); 
function create_option_table() {
global $wpdb;
$table_name = $wpdb->prefix . "option_provide_data";
if($wpdb->get_var("show tables like '$table_name'") != $table_name) {
    $sql = "CREATE TABLE " . $table_name . " (id mediumint(9) NOT NULL AUTO_INCREMENT, option text NOT NULL, booked int DEFAULT 0, PRIMARY KEY  (id));";
    $wpdb->query($sql);
   }
}
/* Runs on plugin deactivation*/
register_deactivation_hook( __FILE__, 'remove_option_table' );
function remove_option_table() {
	global $wpdb;
	$table_name = $wpdb->prefix . "option_provide_data";
	$sql = "DROP TABLE ".$table_name;
	$wpdb->query($sql);
}

if ( is_admin() ){
	/* Call the html code */
	add_action('admin_menu', 'option_provider_admin_menu');
	function option_provider_admin_menu() {
		add_options_page('Options Provider', 'Options Provider', 'administrator', 'option_provider', 'option_provider_html_page');
	}
}
function option_provider_html_page() {
	if(isset($_POST['input']) && $_POST['input']==1){
		global $wpdb;
		$table_name = $wpdb->prefix . "option_provide_data";
		$option = $_POST['option'];
		$sql="insert into ".$table_name."(`option`)values('$option')";
		$wpdb->query($sql);
	}	
	if(isset($_POST['delete']) && $_POST['delete']==1){
		global $wpdb;
		$table_name = $wpdb->prefix . "option_provide_data";
		$id = $_POST['id'];
		$sql="DELETE FROM ".$table_name." WHERE id='$id'";
		$wpdb->query($sql);
	}
?>
	<div>
		<h2>Options Provider setting</h2>
		<form method="post" action="">
			<table width="510">
				<tr valign="top">
					<th width="92" scope="row">Enter Option</th>
					<td width="406">
						<input name="option" type="text" />
					</td>
				</tr>
			</table>
			<input type="hidden" name="input" value=1 />
			<p>
				<input type="submit" value="submit" />
			</p>
		</form>
	</div>
<?php
	global $wpdb;
	$table_name = $wpdb->prefix . "option_provide_data";
	$sel_query = "SELECT * FROM $table_name";
	$result = $wpdb->get_results($sel_query, ARRAY_A);

	echo "<div><table>";
		foreach($result as $row){
			echo "<tr>";
			if($row['booked']){
				echo "<td><h1 style='color:red'>".$row['option']."</h1></td>";
			}else{
				echo "<td><h1>".$row['option']."</h1></td>";
			}
			echo "
				<td>
				<form method='post' action=''>
				<input type='hidden' name='delete' value=1 />
				<input type='hidden' name='id' value=".$row['id']." />
				<input type='submit' value='delete' />
				</form>
				</td>
			";
			echo "</tr>";
		}
	echo "</table></div>";
}

function add_option_on_product() {
?>
	<table class="variations" cellspacing="0">
		<tbody>
			<tr>
			<td class="label"><label for="color">Select a service time</label></td>
			<td class="value">
				<select name='option' required>
					<?php
						global $wpdb;
						$table_name = $wpdb->prefix . "option_provide_data";
						$sel_query = "SELECT * FROM $table_name WHERE booked = 0";
						$result = $wpdb->get_results($sel_query, ARRAY_A);
						foreach($result as $row){
							echo '<option name= "'.$row['option'].'" >' .$row['option'] . '</option>';
						}
					?>
				</select>
			</td>
			</tr>                             
		</tbody>
    </table>
<?php
}
add_action( 'woocommerce_before_add_to_cart_button', 'add_option_on_product' );


function cart_data_insert( $cart_item_meta, $product_id, $variation_id ) { 
	if(isset($_POST['option'])){
		global $woocommerce;
		$cart_item_meta['option'] = $_POST['option'];
		
		global $wpdb;
		$table_name = $wpdb->prefix . "option_provide_data";
		$sql="UPDATE ".$table_name." SET booked=1 WHERE option='".$_POST['option']."'";
		$wpdb->query($sql);
		
		return $cart_item_meta; 
	}
}
add_filter( 'woocommerce_add_cart_item_data', 'cart_data_insert', 10, 3); 

function get_cart_items_from_session( $item, $values, $key ) {
    if ( array_key_exists( 'option', $values ) )
        $item[ 'option' ] = $values['option'];
    return $item;
}
add_filter( 'woocommerce_get_cart_item_from_session', 'get_cart_items_from_session', 1, 3 );

function display_data( $item_data, $cart_item ) { 
	echo "<br>".$cart_item['option'];
    return $item_data; 
}; 
add_filter( 'woocommerce_get_item_data', 'display_data', 10, 2 ); 


function after_remove_product_from_cart($removed_cart_item_key, $instance) {
    $line_item = $instance->removed_cart_contents[ $removed_cart_item_key ];
    $option = $line_item[ 'option' ];
	
	global $wpdb;
	$table_name = $wpdb->prefix . "option_provide_data";
	$sql="UPDATE ".$table_name." SET booked=0 WHERE option='".$option."'";
	$wpdb->query($sql);
}
add_action( 'woocommerce_cart_item_removed', 'after_remove_product_from_cart', 10, 2 );

/*
function filter_woocommerce_cart_item_quantity( $product_quantity, $cart_item_key, $cart_item ) { 
    $product_quantity = 1;
    return $product_quantity; 
}
add_filter( 'woocommerce_cart_item_quantity', 'filter_woocommerce_cart_item_quantity', 10, 3 ); 


function get_rid() {
	echo "";
}
add_action( 'woocommerce_loop_add_to_cart_link', 'get_rid' );
*/
?>