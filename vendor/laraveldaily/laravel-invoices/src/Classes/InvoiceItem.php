<?php

namespace LaravelDaily\Invoices\Classes;

use Exception;
use LaravelDaily\Invoices\Services\PricingService;

/**
 * Class InvoiceItem
 * @package LaravelDaily\Invoices\Classes
 */
class InvoiceItem
{
    /**
     * @var string
     */
    public $title;

    
    /**
     * @var string
     */
    public $jenis;

    /**
     * @var string
     */
    public $warna;

    /**
     * @var string
     */
    public $metpembayaran;


    /**
     * @var string
     */
    public $tahun;

    /**
     * @var string
     */
    public $nopol;

    /**
     * @var string
     */
    public $nosin;

    /**
     * @var string
     */
    public $noka;

    /**
     * @var string
     */
    public $nobpkb;

    /**
     * @var string
     */
    public $lunas;

    /**
     * @var string
     */
    public $dptunai;

    /**
     * @var string
     */
    public $keterangan;

    /**
     * @var string
     */
    public $ketlain;

    /**
     * @var string|bool
     */
    public $description = false;

    /**
     * @var string
     */
    public $units;

    /**
     * @var float
     */
    public $quantity;

    /**
     * @var float
     */
    public $price_per_unit;

    /**
     * @var float
     */
    public $sub_total_price;

    /**
     * @var float
     */
    public $discount;

    /**
     * @var bool
     */
    public $discount_percentage;

    /**
     * @var float
     */
    public $tax;

    /**
     * @var float
     */
    public $tax_percentage;

    /**
     * InvoiceItem constructor.
     */
    public function __construct()
    {
        $this->quantity = 1.0;
        $this->discount = 0.0;
        $this->tax      = 0.0;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function title(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $jenis
     * @return $this
     */
    public function jenis(string $jenis)
    {
        $this->jenis = $jenis;

        return $this;
    }

    
    /**
     * @param string $warna
     * @return $this
     */
    public function warna(string $warna)
    {
        $this->warna = $warna;

        return $this;
    }
    /**
     * @param string $metpembayaran
     * @return $this
     */
    public function metpembayaran(string $metpembayaran)
    {
        $this->metpembayaran = $metpembayaran;

        return $this;
    }
    /**
     * @param string $tahun
     * @return $this
     */
    public function tahun(string $tahun)
    {
        $this->tahun = $tahun;

        return $this;
    }
    /**
     * @param string $nopol
     * @return $this
     */
    public function nopol(string $nopol)
    {
        $this->nopol = $nopol;

        return $this;
    }
    /**
     * @param string $nosin
     * @return $this
     */
    public function nosin(string $nosin)
    {
        $this->nosin = $nosin;

        return $this;
    }
    /**
     * @param string $noka
     * @return $this
     */
    public function noka(string $noka)
    {
        $this->noka = $noka;

        return $this;
    }
    /**
     * @param string $nobpkb
     * @return $this
     */
    public function nobpkb(string $nobpkb)
    {
        $this->nobpkb = $nobpkb;

        return $this;
    }
    /**
     * @param string $lunas
     * @return $this
     */
    public function lunas(string $lunas)
    {
        $this->lunas = $lunas;

        return $this;
    }
    /**
     * @param string $dptunai
     * @return $this
     */
    public function dptunai(string $dptunai)
    {
        $this->dptunai = $dptunai;

        return $this;
    }
    /**
     * @param string $keterangan
     * @return $this
     */
    public function keterangan(string $keterangan)
    {
        $this->keterangan = $keterangan;

        return $this;
    }
    /**
     * @param string $ketlain
     * @return $this
     */
    public function ketlain(string $ketlain)
    {
        $this->ketlain = $ketlain;

        return $this;
    }
    /**
     * @param string $description
     * @return $this
     */
    public function description(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param string $units
     * @return $this
     */
    public function units(string $units)
    {
        $this->units = $units;

        return $this;
    }

    /**
     * @param float $quantity
     * @return $this
     */
    public function quantity(float $quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @param float $price
     * @return $this
     */
    public function pricePerUnit(float $price)
    {
        $this->price_per_unit = $price;

        return $this;
    }

    /**
     * @param float $price
     * @return $this
     */
    public function subTotalPrice(float $price)
    {
        $this->sub_total_price = $price;

        return $this;
    }

    /**
     * @param float $amount
     * @param bool $byPercent
     * @return $this
     * @throws Exception
     */
    public function discount(float $amount, bool $byPercent = false)
    {
        if ($this->hasDiscount()) {
            throw new Exception('InvoiceItem: unable to set discount twice.');
        }

        $this->discount                           = $amount;
        !$byPercent ?: $this->discount_percentage = $amount;

        return $this;
    }

    /**
     * @param float $amount
     * @param bool $byPercent
     * @return $this
     * @throws Exception
     */
    public function tax(float $amount, bool $byPercent = false)
    {
        if ($this->hasTax()) {
            throw new Exception('InvoiceItem: unable to set tax twice.');
        }

        $this->tax                           = $amount;
        !$byPercent ?: $this->tax_percentage = $amount;

        return $this;
    }

    /**
     * @param float $amount
     * @return $this
     * @throws Exception
     */
    public function discountByPercent(float $amount)
    {
        $this->discount($amount, true);

        return $this;
    }

    /**
     * @param float $amount
     * @return $this
     * @throws Exception
     */
    public function taxByPercent(float $amount)
    {
        $this->tax($amount, true);

        return $this;
    }

    /**
     * @return bool
     */
    public function hasUnits()
    {
        return !is_null($this->units);
    }

    /**
     * @return bool
     */
    public function hasDiscount()
    {
        return $this->discount !== 0.0;
    }

    /**
     * @return bool
     */
    public function hasTax()
    {
        return $this->tax !== 0.0;
    }

    /**
     * @param int $decimals
     * @return $this
     */
    public function calculate(int $decimals)
    {
        if (!is_null($this->sub_total_price)) {
            return $this;
        }

        $this->sub_total_price = PricingService::applyQuantity($this->price_per_unit, $this->quantity, $decimals);
        $this->calculateDiscount($decimals);
        $this->calculateTax($decimals);

        return $this;
    }

    /**
     * @param int $decimals
     */
    public function calculateDiscount(int $decimals): void
    {
        $subTotal = $this->sub_total_price;

        if ($this->discount_percentage) {
            $newSubTotal = PricingService::applyDiscount($subTotal, $this->discount_percentage, $decimals, true);
        } else {
            $newSubTotal = PricingService::applyDiscount($subTotal, $this->discount, $decimals);
        }

        $this->sub_total_price = $newSubTotal;
        $this->discount        = $subTotal - $newSubTotal;
    }

    /**
     * @param int $decimals
     */
    public function calculateTax(int $decimals): void
    {
        $subTotal = $this->sub_total_price;

        if ($this->tax_percentage) {
            $newSubTotal = PricingService::applyTax($subTotal, $this->tax_percentage, $decimals, true);
        } else {
            $newSubTotal = PricingService::applyTax($subTotal, $this->tax, $decimals);
        }

        $this->sub_total_price = $newSubTotal;
        $this->tax             = $newSubTotal - $subTotal;
    }

    /**
     * @throws Exception
     */
    public function validate()
    {
        if (is_null($this->title)) {
            throw new Exception('InvoiceItem: title not defined.');
        }

        if (is_null($this->price_per_unit)) {
            throw new Exception('InvoiceItem: price_per_unit not defined.');
        }

    }
}
