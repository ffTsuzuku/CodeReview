<?php
namespace App\Domain\Project;

use App\Domain\Project\Services\ProjectDataValidator;
use App\Helpers\Result;
use Laravel\Ui\Presets\React;

class Project {
    private $id;
    private $clientId;
    private $name;
    private $contactJobTitle;
    private $industry;
    private $type;
    private $addressId;
    private $durationInMonths;
    private $activationDate;
    private $expectedRevenue;
    private $monitorJobsite;
    private $documentProject;
    private $needsHighDefPanoramicCamera;
    private $promoteProjectOnSocialMedia;
    private $needsSecurityCameras;
    private $hasSitePlan;
    private $interiorOrExteriorInstallation;
    private $singleOrMultipleLocations;
    private $height;
    private $clientHasWebcamExperience;
    private $clientWindowShoppedOtherCameras;
    private $needsDroneSupport;
    private $projectManagementSoftware;
    private $jobsiteNetworkCapacity;
    private $jobSitePowerSourceCapacity;
    private $needMovableCameras;
    private $projectContactGender;
    private $projectContactMakesDecisions;
    private $referralSource;
    private $requestedProfessionalInstaller;
    private $owner;
    private $clientPartners;
    private $developer;
    private $notes;
    private $buildingTallOrWide;


    private $dataValidator;
    private function __construct(array $props) {
        $this->dataValidator = new ProjectDataValidator();

        $this->id = safeVal('id', $props);
        $this->clientId = safeVal('clientId', $props);
        $this->name = safeVal('name', $props);
        $this->contactJobTitle = safeVal('contactJobTitle', $props);
        $this->industry = safeVal('industry', $props);
        $this->type = safeVal('type', $props);
        $this->durationInMonths = safeVal('durationInMonths', $props);
        $this->activationDate = safeVal('activationDate', $props);
        $this->expectedRevenue = safeVal('expectedRevenue', $props);
        $this->monitorJobsite = safeVal('monitorJobsite', $props);
        $this->documentProject = safeVal('documentProject', $props);
        $this->needsHighDefPanoramicCamera = safeVal('needsHighDefPanoramicCamera', $props);
        $this->promoteProjectOnSocialMedia = safeVal('promoteProjectOnSocialMedia', $props);
        $this->needsSecurityCameras = safeVal('needsSecurityCameras', $props);
        $this->hasSitePlan = safeVal('hasSitePlan', $props);
        $this->interiorOrExteriorInstallation = safeVal('interiorOrExteriorInstallation', $props);
        $this->singleOrMultipleLocations = safeVal('singleOrMultipleLocations', $props);
        $this->height = safeVal('height', $props);
        $this->clientHasWebcamExperience = safeVal('clientHasWebcamExperience', $props);
        $this->clientWindowShoppedOtherCameras = safeVal('clientWindowShoppedOtherCameras', $props);
        $this->needsDroneSupport = safeVal('needsDroneSupport', $props);
        $this->projectManagementSoftware = safeVal('projectManagementSoftware', $props);
        $this->jobsiteNetworkCapacity = safeVal('jobsiteNetworkCapacity', $props);
        $this->jobSitePowerSourceCapacity = safeVal('jobSitePowerSourceCapacity', $props);
        $this->needMovableCameras = safeVal('needMovableCameras', $props);
        $this->projectContactGender = safeVal('projectContactGender', $props);
        $this->projectContactMakesDecisions = safeVal('projectContactMakesDecisions', $props);
        $this->referralSource = safeVal('referralSource', $props);
        $this->owner = safeVal('owner', $props);
        $this->clientPartners = safeVal('clientPartners', $props);
        $this->developer = safeVal('developer', $props);
        $this->notes = safeVal('notes', $props);
        $this->addressId = safeVal('addressId', $props);
        $this->requestedProfessionalInstaller = safeVal('requestedProfessionalInstaller', $props);
        $this->buildingTallOrWide = safeVal('buildingTallOrWide', $props);
    }

    public static function create(array $props) {
        $dataValidator = new ProjectDataValidator();
        $validationResults = $dataValidator->validateData($props);
        if ($validationResults['failed']) {
            return Result::fail($validationResults['errors'][0]);
        }

        return Result::ok(new self($props));
    }

    public function getId() {
        return $this->id;
    }

    public function getClientId() {
        return $this->clientId;
    }

    public function setClientId($value) {
        $res = $this->dataValidator->validateClientId($value);
        if ($res->isSuccess) {
            $this->clientId = $value;
        }

        return $res;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $result = $this->dataValidator->validateName($value);
        if ($result->isSuccess) {
            $this->name = $value;
        }

        return $result;
    }

    public function getContactJobTitle() {
        return $this->contactJobTitle;
    }

    public function setContactJobTitle($value): Result {
        $result = $this->dataValidator->validateContactJobTitle($value);

        if ($result->isSuccess) {
            $this->contactJobTitle = $value;
        }

        return $result;
    }

    public function getIndustry() {
        return $this->industry;
    }

    public function setIndustry($value): Result {
        $result = $this->dataValidator->validateIndustry($value);
        if ($result->isSuccess) {
            $this->industry = $value;
        }

        return $result;
    }

    public function getAddressId() {
        $this->addressId;
    }

    public function setAddressId($addressId) {
        $result = $this->dataValidator->validateAddressId($addressId);
        if ($result->isSuccess) {
            $this->addressId = $addressId;
        }
        return $result;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $result = $this->dataValidator->validateType($type);
        if ($result->isSuccess) {
            $this->type = $type;
        }
        return $result;
    }

    public function getNotes() {
        return $this->notes;
    }

    public function setNotes($notes) {
        $result = $this->dataValidator->validateNotes($notes);
        if ($result->isSuccess) {
            $this->notes = $notes;
        }

        return $result;
    }

    public function getDurationInMonths() {
        return $this->durationInMonths;
    }

    public function setDurationInMonths($durationInMonths) {
        $result = $this->dataValidator->validateDurationInMonths(
            $durationInMonths
        );
        if ($result->isSuccess) {
            $this->durationInMonths = $durationInMonths;
        }

        return $result;
    }

    public function getHeight() {
        return $this->height;
    }

    public function setHeight($height) {
        $result = $this->dataValidator->validateHeight($height);
        if ($result->isSuccess) {
            $this->height = $height;
        }

        return $result;
    }

    public function getBuildingTallOrWide() {
        return $this->buildingTallOrWide;
    }

    public function setBuildingTallOrWide($tallOrWide) {
        $result = $this->dataValidator->validateBuildingTallOrWide($tallOrWide);
        if ($result->isSuccess) {
            $this->buildingTallOrWide = $tallOrWide;
        }

        return $result;
    }

    public function getActivationDate() {
        return $this->activationDate;
    }

    public function setActivationDate($activationDate) {
        $result = $this->dataValidator->validateActivationDate($activationDate);
        if ($result->isSuccess) {
            $this->activationDate = $activationDate;
        }

        return $result;
    }

    public function getExpectedRevenue() {
        return $this->expectedRevenue;
    }

    public function setExpectedRevenue($expectedRevenue) {
        $result = $this->dataValidator->validateExpectedRevenue($expectedRevenue);
        if ($result->isSuccess) {
            $this->expectedRevenue = $expectedRevenue;
        }

        return $result;
    }

    public function getMonitorJobsite() {
        return $this->monitorJobsite;
    }

    public function setMonitorJobsite($monitorJobsite) {
        $result = $this->dataValidator->validateMonitorJobsite($monitorJobsite);
        if ($result->isSuccess) {
            $this->monitorJobsite = $monitorJobsite;
        }

        return $result;
    }

    public function getDocumentProject() {
        return $this->documentProject;
    }

    public function setDocumentProject($documentProject) {
        $result = $this->dataValidator->validateDocumentProject($documentProject);
        if ($result->isSuccess)  {
            $this->documentProject = $documentProject;
        }
        return $result;
    }

    public function getDeveloper() {
        return $this->developer;
    }

    public function setDeveloper($developer) {
        $result = $this->dataValidator->validateDeveloper($developer);
        if ($result->isSuccess) {
            $this->developer = $developer;
        }
        return $result;
    }

    public function getNeedsHighDefPanoramicCamera() {
        return $this->needsHighDefPanoramicCamera;
    }

    public function setNeedsHighDefPanoramicCamera(
        $needsHighDefPanoramicCamera
    ) {
        $result = $this->dataValidator->validateNeedsHighDefPanoramicCamera(
            $needsHighDefPanoramicCamera
        );
        if ($result->isSuccess) {
            $this->needsHighDefPanoramicCamera = $needsHighDefPanoramicCamera;
        }

        return $result;
    }

    public function getPromoteProjectOnSocialMedia() {
        return $this->promoteProjectOnSocialMedia;
    }

    public function setPromoteProjectOnSocialMedia(
        $promoteProjectOnSocialMedia
    ) {
        $result = $this->dataValidator->validatePromoteProjectOnSocialMedia(
            $promoteProjectOnSocialMedia
        );
        if ($result->isSuccess) {
            $this->promoteProjectOnSocialMedia = $promoteProjectOnSocialMedia;
        }

        return $result;
    }

    public function getNeedsSecurityCameras() {
        return $this->needsSecurityCameras;
    }

    public function setNeedsSecurityCameras($value) {
        $result = $this->dataValidator->validateNeedsSecurityCameras($value);
        if ($result->isSuccess) {
            $this->needsSecurityCameras = $value;
        }
        return $result;
    }

    public function getHasSitePlan() {
        return $this->hasSitePlan;
    }

    public function setHasSitePlan($value) {
        $result = $this->dataValidator->validateHasSitePlan($value);
        if ($result->isSuccess) {
            $this->hasSitePlan = $value;
        }

        return $result;
    }

    public function getInteriorOrExteriorInstallation() {
        return $this->interiorOrExteriorInstallation;
    }

    public function setInteriorOrExteriorInstallation(
        $interiorOrExteriorInstallation
    ) {
        $this->interiorOrExteriorInstallation = $interiorOrExteriorInstallation;
    }

    public function getSingleOrMultipleLocations() {
        return $this->singleOrMultipleLocations;
    }

    public function setSingleOrMultipleLocations($value): Result {
        $result = $this->dataValidator->validateSingleOrMultipleLocations($value);
        if ($result->isSuccess) {
            $this->singleOrMultipleLocations = $value;
        }

        return $result;
    }

    public function getOwner() {
        return $this->owner;
    }

    public function setOwner($owner) {
        $result = $this->dataValidator->validateOwner($owner);
        if ($result->isSuccess) {
            $this->owner = $owner;
        }

        return $result;
    }

    public function getClientPartners() {
        return $this->clientPartners;
    }

    public function setClientPartners($clientPartners) {
        $result = $this->dataValidator->validateClientPartners($clientPartners);
        if($result->isSuccess) {
            $this->clientPartners = $clientPartners;
        }
        return $result;
    }

    public function getClientHasWebcamExperience() {
        return $this->clientHasWebcamExperience;
    }

    public function setClientHasWebcamExperience($value) {
        $result = $this->dataValidator->validateClientHasWebcamExperience($value);
        if ($result->isSuccess) {
            $this->clientHasWebcamExperience = $value;
        }

        return $result;
    }

    public function getClientWindowShoppedOtherCameras() {
        return $this->clientWindowShoppedOtherCameras;
    }

    public function setClientWindowShoppedOtherCameras($value) {
        $result = $this->dataValidator->validateClientWindowShoppedOtherCameras(
            $value
        );
        if ($result->isSuccess) {
            $this->clientWindowShoppedOtherCameras = $value;
        }

        return $result;
    }

    public function getNeedsDroneSupport() {
        return $this->needsDroneSupport;
    }

    public function setNeedsDroneSupport($value) {
        $result = $this->dataValidator->validateNeedsDroneSupport($value);
        if ($result->isSuccess) {
            $this->needsDroneSupport = $value;
        }

        return $result;
    }

    public function getprojectManagementSoftware() {
        return $this->projectManagementSoftware;
    }

    public function setprojectManagementSoftware($projectManagementSoftware) {
        $this->projectManagementSoftware = $projectManagementSoftware;
    }

    public function getJobsiteNetworkCapacity() {
        return $this->jobsiteNetworkCapacity;
    }

    public function setJobsiteNetworkCapacity($network) {
        $this->jobsiteNetworkCapacity = $network;
    }

    public function getJobsitePowerSourceCapacity() {
        return $this->jobSitePowerSourceCapacity;
    }

    public function setJobsitePowerSourceCapacity($capacity) {
        $this->jobSitePowerSourceCapacity = $capacity;
    }

    public function getNeedMovableCameras() {
        return $this->needMovableCameras;
    }

    public function setNeedMovableCameras($needMovableCameras) {
        $this->needMovableCameras = $needMovableCameras;
    }

    public function getProjectContactGender() {
        return $this->projectContactGender;
    }

    public function setProjectContactGender($projectContactGender) {
        $this->projectContactGender = $projectContactGender;
    }

    public function getProjectContactMakesDecisions() {
        return $this->projectContactMakesDecisions;
    }

    public function setProjectContactMakesDecisions($projectContactMakesDecisions) {
        $this->projectContactMakesDecisions = $projectContactMakesDecisions;
    }

    public function getReferralSource() {
        return $this->referralSource;
    }

    public function setReferrallSource($referralSource) {
        $this->referralSource = $referralSource;
    }

    public function getRequestedProfessionalInstaller() {
        return $this->requestedProfessionalInstaller;
    }

    public function setRequestedProfessionalInstaller($requestedProfessionalInstaller) {
        $this->requestedProfessionalInstaller = $requestedProfessionalInstaller;
    }
}

?>