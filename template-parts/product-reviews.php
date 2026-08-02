<?php
if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| Product
|--------------------------------------------------------------------------
*/

global $product;

if (!$product) {
    $product = wc_get_product($product_id);
}

if (!$product || !is_a($product, 'WC_Product')) {
    return;
}

$product_id = $product->get_id();

/*
|--------------------------------------------------------------------------
| Reviews
|--------------------------------------------------------------------------
*/

$reviews = get_comments([
    'post_id' => $product_id,
    'status'  => 'approve',
    'orderby' => 'comment_date_gmt',
    'order'   => 'DESC',
]);

$total_reviews = count($reviews);

/*
|--------------------------------------------------------------------------
| Rating Statistics
|--------------------------------------------------------------------------
*/

$rating_count = [
    1 => 0,
    2 => 0,
    3 => 0,
    4 => 0,
    5 => 0,
];

$total_star = 0;

foreach ($reviews as $review) {

    $rating = (int)get_comment_meta(
        $review->comment_ID,
        'rating',
        true
    );

    if ($rating < 1 || $rating > 5) {
        continue;
    }

    $rating_count[$rating]++;

    $total_star += $rating;
}

$average = $total_reviews
    ? round($total_star / $total_reviews, 1)
    : 0;

/*
|--------------------------------------------------------------------------
| Percent
|--------------------------------------------------------------------------
*/

$percent = [];

foreach ($rating_count as $star => $count) {

    $percent[$star] = $total_reviews
        ? round(($count / $total_reviews) * 100)
        : 0;
}

?>

<div class="reviews-wrap">

    <div class="reviews-summary">

        <div class="reviews-average">

            <div class="reviews-average-number">

                <?= $average ?>

            </div>

            <div class="reviews-average-stars">

                <?php

                $round = round($average);

                echo str_repeat("★", $round);
                echo str_repeat("☆", 5 - $round);

                ?>

            </div>

            <div class="reviews-average-count">

                <?= $total_reviews ?>

                đánh giá

            </div>

        </div>

        <div class="reviews-progress">

            <?php for($i=5;$i>=1;$i--): ?>

                <div class="review-progress-row">

                    <span class="star-label">

                        <?= $i ?>★

                    </span>

                    <div class="progress">

                        <div
                            class="progress-fill"
                            style="width:<?= $percent[$i] ?>%;"
                        ></div>

                    </div>

                    <span class="progress-count">

                        <?= $rating_count[$i] ?>

                    </span>

                </div>

            <?php endfor; ?>

        </div>

    </div>

    <div class="review-filter">

        <button class="review-filter-btn active"
                data-rating="0">

            Tất cả

            (<?= $total_reviews ?>)

        </button>

        <?php for($i=5;$i>=1;$i--): ?>

            <button
                class="review-filter-btn"
                data-rating="<?= $i ?>">

                <?= $i ?>★

                (<?= $rating_count[$i] ?>)

            </button>

        <?php endfor; ?>

    </div>

    <div id="reviewsList">
        <?php if ($total_reviews): ?>

<?php foreach ($reviews as $review):

    $rating = (int) get_comment_meta(
        $review->comment_ID,
        'rating',
        true
    );

    $verified = false;

    if (function_exists('wc_customer_bought_product')) {

        $verified = wc_customer_bought_product(
            $review->comment_author_email,
            $review->user_id,
            $product_id
        );
    }

?>

<div class="review-item"
     data-rating="<?= $rating ?>">

    <div class="review-avatar">

        <?= get_avatar($review, 60); ?>

    </div>

    <div class="review-content">

        <div class="review-top">

            <div>

                <div class="review-author">

                    <?= esc_html($review->comment_author) ?>

                    <?php if ($verified): ?>

                        <span class="verified-owner">

                            ✓ Đã mua hàng

                        </span>

                    <?php endif; ?>

                </div>

                <div class="review-date">

                    <?= human_time_diff(
                        strtotime($review->comment_date),
                        current_time('timestamp')
                    ); ?>

                    trước

                </div>

            </div>

            <div class="review-stars">

                <?php

                echo str_repeat("★", $rating);

                echo str_repeat("☆", 5 - $rating);

                ?>

            </div>

        </div>

        <div class="review-text">

            <?= nl2br(
                esc_html($review->comment_content)
            ); ?>

        </div>

    </div>

</div>

<?php endforeach; ?>

<?php else: ?>

<div class="review-empty">

    <svg width="56"
         height="56"
         viewBox="0 0 24 24"
         fill="none"
         stroke="currentColor"
         stroke-width="2">

        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>

    </svg>

    <h4>

        Chưa có đánh giá nào

    </h4>

    <p>

        Hãy trở thành người đầu tiên đánh giá sản phẩm này.

    </p>

</div>

<?php endif; ?>

</div>
<?php
$require_login = get_option('comment_registration') && !is_user_logged_in();
?>

<div class="review-form-wrap">

    <h3>Viết đánh giá</h3>

    <?php if ($require_login): ?>

        <div class="review-login-required">

            Bạn cần đăng nhập để gửi đánh giá.

        </div>

    <?php else: ?>

        <form id="commentform">

            <input
                type="hidden"
                name="comment_post_ID"
                value="<?= $product_id ?>"
            >

            <input
                type="hidden"
                name="comment_parent"
                value="0"
            >

            <?php if (!is_user_logged_in()): ?>

                <div class="review-grid">

                    <div class="review-field">

                        <label>Họ tên *</label>

                        <input
                            required
                            name="author"
                            type="text"
                        >

                    </div>

                    <div class="review-field">

                        <label>Email *</label>

                        <input
                            required
                            name="email"
                            type="email"
                        >

                    </div>

                </div>

            <?php endif; ?>
<style>
    .rating-select{

    display:inline-flex;

    flex-direction:row-reverse;

    gap:6px;

}

.rating-select input{

    display:none;

}

.rating-select label{

    font-size:34px;

    color:#ddd;

    cursor:pointer;

    transition:.2s;

}

/* hover */

.rating-select label:hover,

.rating-select label:hover~label{

    color:#f5b301;

    transform:scale(1.08);

}

/* selected */

.rating-select input:checked~label{

    color:#f5b301;

}
</style>
            <div class="review-field">
    <label>Đánh giá *</label>

    <div class="rating-select">

        <?php for($i=5;$i>=1;$i--): ?>

            <input
                type="radio"
                id="star<?= $i ?>"
                name="rating"
                value="<?= $i ?>"
            >

            <label for="star<?= $i ?>">★</label>

        <?php endfor; ?>

    </div>
</div>

            <div class="review-field">

                <label>Nội dung *</label>

                <textarea
                    required
                    rows="6"
                    name="comment"
                    placeholder="Chia sẻ trải nghiệm của bạn..."
                ></textarea>

            </div>

            <button
                class="review-submit"
                type="submit">

                Gửi đánh giá

            </button>

        </form>

    <?php endif; ?>

</div>

<script>

document.querySelectorAll(".review-filter-btn").forEach(btn=>{

    btn.onclick=function(){

        document
        .querySelectorAll(".review-filter-btn")
        .forEach(x=>x.classList.remove("active"));

        this.classList.add("active");

        const rating=this.dataset.rating;

        document
        .querySelectorAll(".review-item")
        .forEach(item=>{

            if(rating=="0"){

                item.style.display="flex";

                return;

            }

            item.style.display=
                item.dataset.rating===rating
                ?"flex"
                :"none";

        });

    }

});

</script>