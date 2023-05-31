<?php
namespace App\Domain\Project\Services;

use App\Domain\Services\DataValidator;
use App\Helpers\Result;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ProjectDataValidator extends DataValidator {
    public function __construct() {
        parent::__construct();
        $this->setValidationRules([
            'clientId' => 'required',
            'name' => 'required',
            'contactJobTitle' => 'required',
            'industry' => 'required',
            'type' => 'required',
            'addressId' => 'required',
            'durationInMonths' => 'required|integer',
            'activationDate' => 'required|unix_timestamp|integer',
            'expectedRevenue' => 'required|integer',
            'monitorJobsite' => 'required|integer',
            'documentProject' => 'required|integer',
            'needsHighDefPanoramicCamera' => 'required|integer',
            'promoteProjectOnSocialMedia' => 'required|integer',
            'needsSecurityCameras' => 'required|integer',
            'hasSitePlan' => ['required', Rule::in([1, 2])],
            //'sitePlanImage' => use symlinked path and store there e,
            'interiorOrExteriorInstallation' => [
                Rule::in(['interior', 'exterior', null])
            ],
            'singleOrMultipleLocations' => [
                Rule::in(['single', 'multiple'])
            ],
            'height' => 'nullable|integer',
            'buildingTallOrWide' => [Rule::in(['tall', 'wide', null])],
            'clientHasWebcamExperience' => [Rule::in(['yes', 'no', null])],
            'clientWindowShoppedOtherCameras' => 'required',
            'needsDroneSupport' => [Rule::in(['yes', 'no'])],
            'projectManagementSoftware' => 'required',
            'jobsiteNetworkCapacity' => 'required',
            'jobSitePowerSourceCapacity' => 'required',
            'needMovableCameras' => 'required',
            'projectContactGender' => [Rule::in(['male', 'female', 'unknown'])],
            'projectContactMakesDecisions' => 'required',
            'referralSource' => 'required',
            'requestedProfessionalInstaller' => ['required', Rule::in(['yes', 'no'])],
            'owner' => 'nullable',
            'clientPartners' => 'required|string',
            'developer' => 'nullable',
            'addressId' => 'required|integer',
            'notes' => 'nullable'
        ]);

        $this->setCustomValidationErrorMessages([
            'clientHasWebcamExperience.in' => ':attribute must be "yes" or "no"',
            'height.integer' => ':attribute must be an integer or null',
            'tallOrWide.in' => ':attribute must be of value tall, wide, or null',
            'requestedProfessionalInstaller.in' => ':attribute must be yes or no',
        ]);
    }

    public function validateClientId($value): Result {
        $result = $this->validateRule(
            'clientId',
            'clientId',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for clientId"
            );
        }

        return Result::ok();
    }

    public function validateName($value): Result {
        $result = $this->validateRule(
            'name',
            'name',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for project name"
            );
        }

        return Result::ok();
    }

    public function validateContactJobTitle($value): Result {
        $result = $this->validateRule(
            'contactJobTitle',
            'contactJobTitle',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for jobTitle"
            );
        }

        return Result::ok();
    }

    public function validateIndustry($value): Result {
        $result = $this->validateRule(
            'industry',
            'industry',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for industry"
            );
        }

        return Result::ok();
    }

    public function validateSingleOrMultipleLocations($value): Result {
        $result = $this->validateRule(
            'singleOrMultipleLocations',
            'singleOrMultipleLocations',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for singleOrMultipleLocations"
            );
        }

        return Result::ok();
    }

    public function validateAddressId($value): Result {
        $result = $this->validateRule(
            'addressId',
            'addressId',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for addressId"
            );
        }

        return Result::ok();
    }

    public function validateDurationInMonths($value): Result {
        $result = $this->validateRule(
            'durationInMonths',
            'durationInMonths',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for durationInMonths"
            );
        }

        return Result::ok();
    }

    public function validateActivationDate($value): Result {
        $result = $this->validateRule(
            'activationDate',
            'activationDate',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for activationDate"
            );
        }

        return Result::ok();
    }

    public function validateExpectedRevenue($value): Result {
        $result = $this->validateRule(
            'expectedRevenue',
            'expectedRevenue',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for expectedRevenue"
            );
        }

        return Result::ok();
    }

    public function validateMonitorJobsite($value): Result {
        $result = $this->validateRule(
            'monitorJobsite',
            'monitorJobsite',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for monitorJobsite"
            );
        }

        return Result::ok();
    }

    public function validateDocumentProject($value): Result {
        $result = $this->validateRule(
            'documentProject',
            'documentProject',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for documentProject"
            );
        }

        return Result::ok();
    }

    public function validateNeedsHighDefPanoramicCamera($value): Result {
        $result = $this->validateRule(
            'needsHighDefPanoramicCamera',
            'needsHighDefPanoramicCamera',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for needsHighDefPanoramicCamera"
            );
        }

        return Result::ok();
    }

    public function validatePromoteProjectOnSocialMedia($value): Result {
        $result = $this->validateRule(
            'promoteProjectOnSocialMedia',
            'promoteProjectOnSocialMedia',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for promoteProjectOnSocialMedia"
            );
        }

        return Result::ok();
    }

    public function validateNeedsSecurityCameras($value): Result {
        $result = $this->validateRule(
            'needsSecurityCameras',
            'needsSecurityCameras',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for needsSecurityCameras"
            );
        }

        return Result::ok();
    }

    public function validateHasSitePlan($value): Result {
        $result = $this->validateRule(
            'hasSitePlan',
            'hasSitePlan',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for hasSitePlan"
            );
        }

        return Result::ok();
    }

    public function validateInteriorOrExteriorInstallation($value): Result {
        $result = $this->validateRule(
            'interiorOrExteriorInstallation',
            'interiorOrExteriorInstallation',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for interiorOrExteriorInstallation"
            );
        }

        return Result::ok();
    }

    public function validateHeight($value): Result {
        $result = $this->validateRule(
            'height',
            'height',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for height"
            );
        }

        return Result::ok();
    }

    public function validateClientHasWebcamExperience($value): Result {
        $result = $this->validateRule(
            'clientHasWebcamExperience',
            'clientHasWebcamExperience',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for clientHasWebcamExperience"
            );
        }

        return Result::ok();
    }

    public function validateClientWindowShoppedOtherCameras($value): Result {
        $result = $this->validateRule(
            'clientWindowShoppedOtherCameras',
            'clientWindowShoppedOtherCameras',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for clientWindowShoppedOtherCameras"
            );
        }

        return Result::ok();
    }

    public function validateNeedsDroneSupport($value): Result {
        $result = $this->validateRule(
            'needsDroneSupport',
            'needsDroneSupport',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for needsDroneSupport"
            );
        }

        return Result::ok();
    }

    public function validateProjectManagementSoftware($value): Result {
        $result = $this->validateRule(
            'projectManagementSoftware',
            'projectManagementSoftware',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for projectManagementSoftware"
            );
        }

        return Result::ok();
    }

    public function validateJobsiteNetworkCapacity($value): Result {
        $result = $this->validateRule(
            'jobsiteNetworkCapacity',
            'jobsiteNetworkCapacity',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for jobsiteNetworkCapacity"
            );
        }

        return Result::ok();
    }

    public function validateJobSitePowerSourceCapacity($value): Result {
        $result = $this->validateRule(
            'jobSitePowerSourceCapacity',
            'jobSitePowerSourceCapacity',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for jobSitePowerSourceCapacity"
            );
        }

        return Result::ok();
    }

    public function validateNeedMovableCameras($value): Result {
        $result = $this->validateRule(
            'needMovableCameras',
            'needMovableCameras',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for needMovableCameras"
            );
        }

        return Result::ok();
    }

    public function validateProjectContactGender($value): Result {
        $result = $this->validateRule(
            'projectContactGender',
            'projectContactGender',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for projectContactGender"
            );
        }

        return Result::ok();
    }

    public function validateProjectContactMakesDecisions($value): Result {
        $result = $this->validateRule(
            'projectContactMakesDecisions',
            'projectContactMakesDecisions',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for projectContactMakesDecisions"
            );
        }

        return Result::ok();
    }

    public function validateReferralSource($value): Result {
        $result = $this->validateRule(
            'referralSource',
            'referralSource',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for referralSource"
            );
        }

        return Result::ok();
    }

    public function validateRequestedProfessionalInstaller($value): Result {
        $result = $this->validateRule(
            'requestedProfessionalInstaller',
            'requestedProfessionalInstaller',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for requestedProfessionalInstaller"
            );
        }

        return Result::ok();
    }

    public function validateOwner($value): Result {
        $result = $this->validateRule(
            'owner',
            'owner',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for owner"
            );
        }

        return Result::ok();
    }

    public function validateClientPartners($value): Result {
        $result = $this->validateRule(
            'clientPartners',
            'clientPartners',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for clientPartners"
            );
        }

        return Result::ok();
    }

    public function validateDeveloper($value): Result {
        $result = $this->validateRule(
            'developer',
            'developer',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for developer"
            );
        }

        return Result::ok();
    }

    public function validateNotes($value): Result {
        $result = $this->validateRule(
            'notes',
            'notes',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for notes"
            );
        }

        return Result::ok();
    }

    public function validateBuildingTallOrWide($value): Result {
        $result = $this->validateRule(
            'buildingTallOrWide',
            'buildingTallOrWide',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for buildingTallOrWide"
            );
        }

        return Result::ok();
    }

    public function validateType($value): Result {
        $result = $this->validateRule(
            'type',
            'type',
            $value
        );

        if (!$result) {
            return Result::fail(
                "$value " .
                "is not a valid value for project type"
            );
        }

        return Result::ok();
    }
}

?>