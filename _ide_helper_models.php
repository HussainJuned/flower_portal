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
 * App\Order
 *
 * @property int $id
 * @property int $buyer_user_id
 * @property int $seller_user_id
 * @property int $product_id
 * @property string $order_date
 * @property int $status
 * @property string $shipping
 * @property string $zip
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $buyer
 * @property-read \App\Product $product
 * @property-read \App\User $seller
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereBuyerUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereOrderDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereSellerUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereShipping($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereZip($value)
 */
	class Order extends \Eloquent {}
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
 * @property string $origin
 * @property string $colour
 * @property string $category
 * @property string $available_date
 * @property int $status
 * @property string $photo_url
 * @property int $stock
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProductReview[] $reviews
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereAvailableDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereColour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereNumberOfStem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereOrigin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePhotoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePricePerStemBunch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUserId($value)
 */
	class Product extends \Eloquent {}
}

namespace App{
/**
 * App\ProductReview
 *
 * @property int $id
 * @property int $product_id
 * @property int $quality
 * @property string $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductReview query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductReview whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductReview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductReview whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductReview whereQuality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductReview whereUpdatedAt($value)
 */
	class ProductReview extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-read \App\Userinfo $userinfo
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Userinfo whereZip($value)
 */
	class Userinfo extends \Eloquent {}
}

