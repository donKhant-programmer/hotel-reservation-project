namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && auth()->user()->isAdmin()) {
            return $next($request);
        }

        // Redirect if not admin
        return redirect('/home')->with('error', 'You do not have admin access.');
    }
}
