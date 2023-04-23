<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\PasswordReset
 *
 * @property string $email
 * @property string $token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereToken($value)
 * @mixin \Eloquent
 */
	class IdeHelperPasswordReset {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $role
 * @property \Illuminate\Support\Carbon|null $blocked_at
 * @property \Illuminate\Support\Carbon|null $access_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAccessAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBlockedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser {}
}

namespace App\Models{
/**
 * App\Models\course
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $img
 * @method static \Illuminate\Database\Eloquent\Builder|course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|course query()
 * @method static \Illuminate\Database\Eloquent\Builder|course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|course whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|course whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|course whereTitle($value)
 * @mixin \Eloquent
 */
	class IdeHelpercourse {}
}

namespace App\Models{
/**
 * App\Models\direction
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $img
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|direction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|direction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|direction query()
 * @method static \Illuminate\Database\Eloquent\Builder|direction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|direction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|direction whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|direction whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|direction whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|direction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperdirection {}
}

namespace App\Models{
/**
 * App\Models\employment
 *
 * @property int $id
 * @property string $name
 * @property string|null $img
 * @property string|null $video
 * @method static \Illuminate\Database\Eloquent\Builder|employment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|employment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|employment query()
 * @method static \Illuminate\Database\Eloquent\Builder|employment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|employment whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|employment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|employment whereVideo($value)
 * @mixin \Eloquent
 */
	class IdeHelperemployment {}
}

namespace App\Models{
/**
 * App\Models\poster
 *
 * @property int $id
 * @property string $img
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|poster newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|poster newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|poster query()
 * @method static \Illuminate\Database\Eloquent\Builder|poster whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|poster whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|poster whereName($value)
 * @mixin \Eloquent
 */
	class IdeHelperposter {}
}

namespace App\Models{
/**
 * App\Models\teacher
 *
 * @property int $id
 * @property string $fullName
 * @property string $text
 * @property string $img
 * @method static \Illuminate\Database\Eloquent\Builder|teacher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|teacher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|teacher query()
 * @method static \Illuminate\Database\Eloquent\Builder|teacher whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|teacher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|teacher whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|teacher whereText($value)
 * @mixin \Eloquent
 */
	class IdeHelperteacher {}
}

