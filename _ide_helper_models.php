<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Buyer
 *
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Buyer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Buyer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Buyer query()
 */
	class Buyer extends \Eloquent {}
}

namespace App{
/**
 * App\BuyerAccountReview
 *
 * @property int $id
 * @property int $buyer_user_id
 * @property int $seller_user_id
 * @property int $order_id
 * @property int $quality
 * @property string $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAccountReview getBar($buyer_user_id, $seller_user_id)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAccountReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAccountReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAccountReview query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAccountReview whereBuyerUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAccountReview whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAccountReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAccountReview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAccountReview whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAccountReview whereQuality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAccountReview whereSellerUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAccountReview whereUpdatedAt($value)
 */
	class BuyerAccountReview extends \Eloquent {}
}

namespace App{
/**
 * App\BuyerAddress
 *
 * @property int $id
 * @property int $user_id
 * @property string $country
 * @property string|null $state
 * @property string $city
 * @property string $delivery_address_1
 * @property string|null $delivery_address_2
 * @property string $zip
 * @property string|null $suite
 * @property string|null $buzzer
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAddress whereBuzzer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAddress whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAddress whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAddress whereDeliveryAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAddress whereDeliveryAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAddress whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAddress whereSuite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAddress whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAddress whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerAddress whereZip($value)
 */
	class BuyerAddress extends \Eloquent {}
}

namespace App{
/**
 * App\BuyerInvoice
 *
 * @property int $id
 * @property int $user_id
 * @property int $order_id
 * @property string $due_date
 * @property string $currency
 * @property float $amount
 * @property int $paid
 * @property float $outstanding
 * @property int $age_of_invoice
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $buyer
 * @property-read \App\Order $order
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerInvoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerInvoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerInvoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerInvoice whereAgeOfInvoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerInvoice whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerInvoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerInvoice whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerInvoice whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerInvoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerInvoice whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerInvoice whereOutstanding($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerInvoice wherePaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerInvoice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuyerInvoice whereUserId($value)
 */
	class BuyerInvoice extends \Eloquent {}
}

namespace App{
/**
 * App\Category
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App{
/**
 * App\Order
 *
 * @property int $id
 * @property int $buyer_user_id
 * @property int $seller_user_id
 * @property float|null $order_total_price
 * @property string $order_date
 * @property int $status
 * @property string|null $purchase_order_name
 * @property string|null $delivery_option
 * @property int $buyer_address_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $buyer
 * @property-read \App\BuyerAccountReview $buyerAccountReview
 * @property-read \App\BuyerAddress $buyer_address
 * @property-read \App\BuyerInvoice $invoice
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\OrderProduct[] $orderProducts
 * @property-read int|null $order_products_count
 * @property-read \App\Product $product
 * @property-read \App\ProductReview $productReview
 * @property-read \App\User $seller
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereBuyerAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereBuyerUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereDeliveryOption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereOrderDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereOrderTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order wherePurchaseOrderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereSellerUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUpdatedAt($value)
 */
	class Order extends \Eloquent {}
}

namespace App{
/**
 * App\OrderProduct
 *
 * @property int $id
 * @property int $product_id
 * @property int $order_id
 * @property int $quantity
 * @property float $unit_price
 * @property float $total_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Order $order
 * @property-read \App\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct whereUpdatedAt($value)
 */
	class OrderProduct extends \Eloquent {}
}

namespace App{
/**
 * App\PreferredCommunication
 *
 * @property int $id
 * @property int $user_id
 * @property int $general
 * @property string|null $email_general
 * @property int $order_confirmation
 * @property string|null $email_order_confirmation
 * @property int $shipment
 * @property string|null $email_shipment
 * @property int $invoices
 * @property string|null $email_invoices
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreferredCommunication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreferredCommunication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreferredCommunication query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreferredCommunication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreferredCommunication whereEmailGeneral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreferredCommunication whereEmailInvoices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreferredCommunication whereEmailOrderConfirmation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreferredCommunication whereEmailShipment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreferredCommunication whereGeneral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreferredCommunication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreferredCommunication whereInvoices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreferredCommunication whereOrderConfirmation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreferredCommunication whereShipment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreferredCommunication whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreferredCommunication whereUserId($value)
 */
	class PreferredCommunication extends \Eloquent {}
}

namespace App{
/**
 * App\Product
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $description
 * @property float $price_per_stem_bunch
 * @property int $number_of_stem
 * @property float $price
 * @property string $pack
 * @property string $height
 * @property string|null $weight
 * @property string $origin
 * @property string $colour
 * @property string $category
 * @property string $available_date_start
 * @property string $available_date_end
 * @property int $status
 * @property string $photo_url
 * @property int $stock
 * @property int $s_increment
 * @property int $feature
 * @property string|null $grower
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Category $categoryR
 * @property-read mixed $ad
 * @property mixed $tag_names
 * @property-read \Illuminate\Database\Eloquent\Collection $tags
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProductReview[] $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Conner\Tagging\Model\Tagged[] $tagged
 * @property-read int|null $tagged_count
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product filterByCategory($arr)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product isAvailableOn($date)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product name($keyword)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereAvailableDateEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereAvailableDateStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereColour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereFeature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereGrower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereNumberOfStem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereOrigin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePhotoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePricePerStemBunch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereSIncrement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product withAllTags($tagNames)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product withAnyTag($tagNames)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product withoutTags($tagNames)
 */
	class Product extends \Eloquent {}
}

namespace App{
/**
 * App\ProductCategory
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory whereUpdatedAt($value)
 */
	class ProductCategory extends \Eloquent {}
}

namespace App{
/**
 * App\ProductReview
 *
 * @property int $id
 * @property int $product_id
 * @property int $order_id
 * @property int $quality
 * @property string $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Order $order
 * @property-read \App\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductReview query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductReview whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductReview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductReview whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductReview whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductReview whereQuality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductReview whereUpdatedAt($value)
 */
	class ProductReview extends \Eloquent {}
}

namespace App{
/**
 * App\ShoppingCart
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ShoppingCart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ShoppingCart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ShoppingCart query()
 */
	class ShoppingCart extends \Eloquent {}
}

namespace App{
/**
 * App\TempImgUpload
 *
 * @property int $id
 * @property int $user_id
 * @property string $unique_id
 * @property string $path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TempImgUpload newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TempImgUpload newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TempImgUpload query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TempImgUpload whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TempImgUpload whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TempImgUpload wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TempImgUpload whereUniqueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TempImgUpload whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TempImgUpload whereUserId($value)
 */
	class TempImgUpload extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property int|null $role_id
 * @property string $name
 * @property string $email
 * @property string|null $avatar
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $settings
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\BuyerAccountReview[] $buyerAccountReviews
 * @property-read int|null $buyer_account_reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\BuyerAddress[] $buyerAddresses
 * @property-read int|null $buyer_addresses_count
 * @property mixed $locale
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\BuyerInvoice[] $invoices
 * @property-read int|null $invoices_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $latestProducts
 * @property-read int|null $latest_products_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Order[] $orders_as_buyer
 * @property-read int|null $orders_as_buyer_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Order[] $orders_as_seller
 * @property-read int|null $orders_as_seller_count
 * @property-read \App\PreferredCommunication $preferred_communication
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-read int|null $products_count
 * @property-read \TCG\Voyager\Models\Role|null $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\TCG\Voyager\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \App\Userinfo $userinfo
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Userinfo
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $company_name
 * @property string $title
 * @property string $first_name
 * @property string $last_name
 * @property string $country
 * @property string|null $state
 * @property string $city
 * @property string $delivery_address_1
 * @property string|null $delivery_address_2
 * @property string $zip
 * @property string $telephone
 * @property string $business_type
 * @property string $hear_about_us
 * @property string|null $comments
 * @property string $language
 * @property string|null $website
 * @property string|null $fax
 * @property int $isSeller
 * @property int $isBuyer
 * @property int $status
 * @property string $payment_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereBusinessType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereDeliveryAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereDeliveryAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereHearAboutUs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereIsBuyer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereIsSeller($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereZip($value)
 */
	class Userinfo extends \Eloquent {}
}

