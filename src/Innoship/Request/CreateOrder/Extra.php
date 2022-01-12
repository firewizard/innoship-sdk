<?php

namespace Innoship\Request\CreateOrder;

use Innoship\Traits\Setter;
use Innoship\Request\Contract;

/**
 * @property-write $bankRepaymentAmount
 * @property-write $bankRepaymentCurrency
 * @property-write $bank
 * @property-write $bankIban
 * @property-write $cashOnDeliveryAmount
 * @property-write $cashOnDeliveryAmountCurrency
 * @property-write $declaredValueAmount
 * @property-write $declaredValueAmountCurrency
 * @property-write $openPackage
 * @property-write $saturdayDelivery
 * @property-write $insuranceAmount
 * @property-write $reference1
 * @property-write $reference2
 * @property-write $reference3
 * @property-write $reference4
 * @property-write $returnOfDocuments
 * @property-write $returnOfDocumentsComment
 * @property-write $returnPackage
 *
 * @method Extra setBankRepaymentAmount(float $value)
 * @method Extra setBankRepaymentCurrency(string $value)
 * @method Extra setBank(string $value)
 * @method Extra setBankIban(string $value)
 * @method Extra setCashOnDeliveryAmount(float $value)
 * @method Extra setCashOnDeliveryAmountCurrency(string $value)
 * @method Extra setDeclaredValueAmount(float $value)
 * @method Extra setDeclaredValueAmountCurrency(string $value)
 * @method Extra setOpenPackage(boolean $value)
 * @method Extra setSaturdayDelivery(boolean $value)
 * @method Extra setInsuranceAmount(float $value)
 * @method Extra setReference1(string $value)
 * @method Extra setReference2(string $value)
 * @method Extra setReference3(string $value)
 * @method Extra setReference4(string $value)
 * @method Extra setReturnOfDocuments(boolean $value)
 * @method Extra setReturnOfDocumentsComment(string $value)
 * @method Extra setReturnPackage(boolean $value)
 */

class Extra implements Contract
{
    use Setter;

    /** @var float Amount of money for cash on delivery - will be returned via bank */
    protected $bankRepaymentAmount;

    /** @var string[3] Currency for bank repayment amount */
    protected $bankRepaymentCurrency;

    /** @var string[50] Bank name - Required for pick-ups with Bank Repayment Amount */
    protected $bank;

    /** @var string[35]    Sender IBAN code - Required for pick-ups with Bank Repayment Amount */
    protected $bankIban;

    /** @var float Amount of money for cash on delivery - will be returned as cash */
    protected $cashOnDeliveryAmount;

    /** @var string[3] Currency for cash on delivery amount */
    protected $cashOnDeliveryAmountCurrency;

    /** @var float Declared shipment valued for customs declaration */
    protected $declaredValueAmount;

    /** @var string[3] Currency for declared value amount */
    protected $declaredValueAmountCurrency;

    /** @var boolean Open package request */
    protected $openPackage;

    /** @var boolean Deliver on Saturday */
    protected $saturdayDelivery;

    /** @var float Amount to be insured */
    protected $insuranceAmount;

    /** @var string[100] Reference free text 1 - Can be mapped to courier fields */
    protected $reference1;

    /** @var string[100] Reference free text 2 - Can be mapped to courier fields */
    protected $reference2;

    /** @var string[100] Reference free text 3 - Can be mapped to courier fields */
    protected $reference3;

    /** @var string[100] Reference free text 4 - Can be mapped to courier fields */
    protected $reference4;

    /** @var boolean return of Documents (ROD) additional service requires documents to be returned upon the delivery of the primary shipment. */
    protected $returnOfDocuments;

    /** @var string[250] Comment for returned documents */
    protected $returnOfDocumentsComment;

    /** @var boolean if you want to return a package */
    protected $returnPackage;

    public function data(): array
    {
        return array_filter([
            'BankRepaymentAmount' => $this->bankRepaymentAmount,
            'BankRepaymentCurrency' => $this->bankRepaymentCurrency,
            'Bank' => $this->bank,
            'BankIban' => $this->bankIban,
            'CashOnDeliveryAmount' => $this->cashOnDeliveryAmount,
            'cashOnDeliveryAmountCurrency' => $this->cashOnDeliveryAmountCurrency,
            'DeclaredValueAmount' => $this->declaredValueAmount,
            'DeclaredValueAmountCurrency' => $this->declaredValueAmountCurrency,
            'OpenPackage' => $this->openPackage,
            'SaturdayDelivery' => $this->saturdayDelivery,
            'InsuranceAmount' => $this->insuranceAmount,
            'Reference1' => $this->reference1,
            'Reference2' => $this->reference2,
            'Reference3' => $this->reference3,
            'Reference4' => $this->reference4,
            'ReturnOfDocuments' => $this->returnOfDocuments,
            'ReturnOfDocumentsComment' => $this->returnOfDocumentsComment,
            'ReturnPackage' => $this->returnPackage,
        ], function ($el) {
            return $el !== null;
        });
    }
}
