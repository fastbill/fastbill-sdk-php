<?php declare(strict_types=1);

namespace FastBillSdk\WorkTime;

use FastBillSdk\Common\MissingPropertyException;

class WorkTimeValidator
{
    public function validateRequiredCreationProperties(WorkTimeEntity $entity): array
    {
        $errorMessages = [];

        try {
            $this->checkCustomerId($entity);
        } catch (MissingPropertyException $exception) {
            $errorMessages[] = $exception->getMessage();
        }

        try {
            $this->checkProjectId($entity);
        } catch (MissingPropertyException $exception) {
            $errorMessages[] = $exception->getMessage();
        }

        try {
            $this->checkStartTime($entity);
        } catch (MissingPropertyException $exception) {
            $errorMessages[] = $exception->getMessage();
        }

        return $errorMessages;
    }

    public function validateRequiredUpdateProperties(WorkTimeEntity $entity): array
    {
        $errorMessages = $this->validateRequiredCreationProperties($entity);

        try {
            $this->checkTimeId($entity);
        } catch (MissingPropertyException $exception) {
            $errorMessages[] = $exception->getMessage();
        }

        return $errorMessages;
    }

    public function validateRequiredDeleteProperties(WorkTimeEntity $entity): array
    {
        $errorMessages = [];

        try {
            $this->checkTimeId($entity);
        } catch (MissingPropertyException $exception) {
            $errorMessages[] = $exception->getMessage();
        }

        return $errorMessages;
    }

    private function checkCustomerId(WorkTimeEntity $entity): void
    {
        if (!$entity->customerId) {
            throw new MissingPropertyException('The property customerId is not valid!');
        }
    }

    private function checkProjectId(WorkTimeEntity $entity): void
    {
        if (!$entity->projectId) {
            throw new MissingPropertyException('The property projectId is not valid!');
        }
    }

    private function checkStartTime(WorkTimeEntity $entity): void
    {
        if (!$entity->startTime) {
            throw new MissingPropertyException('The property startTime is not valid!');
        }
    }

    private function checkTimeId(WorkTimeEntity $entity): void
    {
        if (!$entity->timeId) {
            throw new MissingPropertyException('The property timeId is not valid!');
        }
    }
}
