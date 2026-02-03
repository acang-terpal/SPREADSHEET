<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Geomigas;


class LoginController extends Controller
{
    public function getLoginPage(){

        // parse geojson and insert to postgis
        // $url = 'https://geologi.esdm.go.id/geomigas/api/basin?token=geomigas_api_token_2026';
        // $pageContent = file_get_contents($url);
        // $geomJsonArr = json_decode($pageContent, false);

        // $feature = $geomJsonArr->content->data->features;
        // for($i=0; $i < count($feature); $i++){
        //     $geoJsonStr= json_encode($feature[$i]->geometry, JSON_PRETTY_PRINT);
        //     $sql = DB::connection('pgsql_second')->table('geomigas')->insert(
        //         [
        //             'name' => $feature[$i]->properties->name,
        //             'color' => $feature[$i]->properties->color,
        //             'stat' => $feature[$i]->properties->stat,
        //             'area_sqkm' => $feature[$i]->properties->area_sqkm,
        //             'capacity_oil' => $feature[$i]->properties->capacity_oil,
        //             'capacity_gas' => $feature[$i]->properties->capacity_gas,
        //             'resource_oil_p50' => $feature[$i]->properties->resource_oil_p50,
        //             'resource_gas_p50' => $feature[$i]->properties->resource_gas_p50,
        //             'resource_mnk_oil' => $feature[$i]->properties->resource_mnk_oil,
        //             'resource_mnk_gas' => $feature[$i]->properties->resource_mnk_gas,
        //             'created_at' => DB::raw("now()"),
        //             'geom' => DB::raw("ST_AsEWKB(ST_SetSRID(ST_GeomFromGeoJSON('{$geoJsonStr}'), 4326))")
        //             // 'geom' => DB::raw("ST_Force2D(ST_AsEWKB(ST_SetSRID(ST_GeomFromGeoJSON('{$geoJsonStr}'), 4326)))") //if data type coloum is 2D
        //         ]
        //     );
        //     $values = [
        //         'name' => $feature[$i]->properties->name,
        //         'color' => $feature[$i]->properties->color,
        //         'stat' => $feature[$i]->properties->stat,
        //         'area_sqkm' => $feature[$i]->properties->area_sqkm,
        //         'capacity_oil' => $feature[$i]->properties->capacity_oil,
        //         'capacity_gas' => $feature[$i]->properties->capacity_gas,
        //         'resource_oil_p50' => $feature[$i]->properties->resource_oil_p50,
        //         'resource_gas_p50' => $feature[$i]->properties->resource_gas_p50,
        //         'resource_mnk_oil' => $feature[$i]->properties->resource_mnk_oil,
        //         'resource_mnk_gas' => $feature[$i]->properties->resource_mnk_gas,
        //         'geom' => DB::raw("ST_AsEWKB(ST_SetSRID(ST_GeomFromGeoJSON('{$geoJsonStr}'), 4326))")
        //     ];
        //     $builder = DB::connection('pgsql_second')->table('geomigas');
        //     $sql = $builder->getGrammar()->compileInsert($builder, $values);
        //     Log::info("". print_r($sql, true));

        // }

        return view('login');
    }

    public function doLogin(Request $request) {
        #default user : admin@email.com, password 123456
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check if the user has the 'admin' role
            if ($user->hasRole('admin')) {
                $request->session()->regenerate(false);
                return redirect()->intended('/index'); // Redirect admin
            }

            // Default redirect for other users
            $request->session()->regenerate(false);
            return redirect()->intended('/mailbox');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function doLogout(Request $request, $user){
        $user = Auth::user();

        // Invalidate session and regenerate token
        Auth::guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Check role to decide redirection (using hasRole() or getRoleNames() methods from Spatie)
        if ($user && $user->hasRole('admin')) {
            return redirect('/'); // Redirect to admin login page
        }

        return redirect('/'); // Default redirect
    }
}
