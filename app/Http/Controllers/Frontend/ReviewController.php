<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Models\Review;
use Exception;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreReviewRequest $request)
    {
        try {
            $review = new Review();
            $review->name = $request->name;
            $review->email = $request->email;
            $review->review = $request->review;
            $review->stars = $request->stars;

            $review->save();

            return response()->json(['status' => 200, 'message' => 'Terimakasih sudah memberi ulasan untuk kampung ketupat, ulasan anda akan segera kami publikasikan.']);
        } catch (Exception $error) {
            app('sentry')->captureException($error);
            return response()
                ->json(
                    ['status' => $error->getCode(), 'message' => 'Sepertinya terjadi kesalahan saat mengirim ulasan anda, silakan coba lagi.'],
                    400
                );
        }
    }
}
