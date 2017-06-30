<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Activity
 *
 */
	class Activity extends \Eloquent {}
}

namespace App{
/**
 * App\Channel
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Thread[] $threads
 * @method static \Illuminate\Database\Query\Builder|\App\Channel whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Channel whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Channel whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Channel whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Channel whereUpdatedAt($value)
 */
	class Channel extends \Eloquent {}
}

namespace App{
/**
 * App\Favorite
 *
 * @property int $id
 * @property int $user_id
 * @property int $favorite_id
 * @property string $favorite_type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Favorite whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Favorite whereFavoriteId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Favorite whereFavoriteType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Favorite whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Favorite whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Favorite whereUserId($value)
 */
	class Favorite extends \Eloquent {}
}

namespace App{
/**
 * App\Reply
 *
 * @property int $id
 * @property int $user_id
 * @property int $thread_id
 * @property string $body
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Favorite[] $favorites
 * @property-read mixed $favorites_count
 * @property-read \App\User $owner
 * @method static \Illuminate\Database\Query\Builder|\App\Reply whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reply whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reply whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reply whereThreadId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reply whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reply whereUserId($value)
 */
	class Reply extends \Eloquent {}
}

namespace App{
/**
 * App\Thread
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property int $user_id
 * @property int $channel_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Channel $channel
 * @property-read \App\User $creator
 * @property-read mixed $reply_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Reply[] $replies
 * @method static \Illuminate\Database\Query\Builder|\App\Thread filter($filters)
 * @method static \Illuminate\Database\Query\Builder|\App\Thread whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Thread whereChannelId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Thread whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Thread whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Thread whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Thread whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Thread whereUserId($value)
 */
	class Thread extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Thread[] $threads
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

