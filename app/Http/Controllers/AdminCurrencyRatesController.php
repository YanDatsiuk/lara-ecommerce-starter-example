<?php

namespace App\Http\Controllers;

use App\CurrencyRate;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class AdminCurrencyRatesController extends Controller
{
    /*
     * Page with list of currency rates
     */
    public function currencyRates()
    {

        //Getting all currency rates
        $currencyRates = CurrencyRate::all();

        return view('pages.admin.currency-rates.currency-rates', [
            'currencyRates' => $currencyRates
        ]);
    }

    /*
     * Create currency rate page
     */
    public function create()
    {
        return view('pages.admin.currency-rates.create');
    }

    /*
     * Store currency rate page
     */
    public function store(Request $request)
    {

        // Validating the request...
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        } else {

            //Storing new currency rate
            $currencyRate = new CurrencyRate();
            $currencyRate->usd = $request->usd;
            $currencyRate->uah = $request->uah;
            $currencyRate->eur = $request->eur;
            $currencyRate->save();
        }

        return $this->create();
    }

    /*
     * Edit currency rate page
     */
    public function edit($id){

        $currencyRate = CurrencyRate::find($id);

        return view('pages.admin.currency-rates.edit',[
            'currencyRate' => $currencyRate
        ]);
    }

    /*
     * Update existing currency rate
     */
    public function update(Request $request, $id){

        //Finding currency rate by id
        $currencyRate = CurrencyRate::find($id);

        // Validating the request...
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        } else {

            //Updating currency rate
            $currencyRate->usd = $request->usd;
            $currencyRate->uah = $request->uah;
            $currencyRate->eur = $request->eur;
            $currencyRate->save();
        }

        return $this->edit($id);
    }

    /*
     * Delete currency rate
     */
    public function delete($id){

        $currencyRate = CurrencyRate::find($id);
        $currencyRate->delete();

        return $this->currencyRates();
    }

    /*
     * VALIDATION
     */

    /**
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'usd' => 'required|numeric',
            'uah' => 'required|numeric',
            'eur' => 'required|numeric',
        ]);
    }
}
