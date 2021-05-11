<?php

namespace Junges\Pix\Api\Filters;

use Junges\Pix\Api\Contracts\ApplyApiFilters;

class CobvFilters implements ApplyApiFilters
{
    const START = 'inicio';
    const END = 'fim';
    const CPF = 'cpf';
    const CNPJ = 'cnpj';
    const LOCATION_PRESENT = 'locationPresente';
    const STATUS = 'status';
    const COBV_BATCH_ID = 'loteCobVId';
    const PAGINATION_ITEMS_PER_PAGE = 'paginacao.itensPorPagina';
    const PAGINATION_ACTUAL_PAGE = 'paginacao.paginaAtual';

    private string $start;
    private string $end;
    private string $cpf;
    private string $cnpj;
    private string $locationPresent;
    private string $status;
    private string $cobvBatchId;
    private int $itemsPerPage;
    private int $actualPage;

    public function startingAt(string $start): CobvFilters
    {
        $this->start = $start;

        return $this;
    }

    public function endingAt(string $end): CobvFilters
    {
        $this->end = $end;

        return $this;
    }

    public function cpf(string $cpf): CobvFilters
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function cnpj(string $cnpj): CobvFilters
    {
        $this->cnpj = $cnpj;
        return $this;
    }

    public function withLocationPresent(): CobvFilters
    {
        $this->locationPresent = "true";
        return $this;
    }

    public function withoutLocationPresent(): CobvFilters
    {
        $this->locationPresent = "false";

        return $this;
    }

    public function withStatus(string $status): CobvFilters
    {
        $this->status = $status;

        return $this;
    }

    public function itemsPerPage(int $itemsPerPage): CobvFilters
    {
        $this->itemsPerPage = $itemsPerPage;

        return $this;
    }

    public function actualPage(int $actualPage): CobvFilters
    {
        $this->actualPage = $actualPage;

        return $this;
    }

    public function cobvBatchId(string $cobvBatchId): CobvFilters
    {
        $this->cobvBatchId = $cobvBatchId;
        return $this;
    }

    public function toArray(): array
    {
        $filters = [
            self::START => $this->start,
            self::END => $this->end,
        ];

        if (!empty($this->locationPresent)) {
            $filters[self::LOCATION_PRESENT] = $this->locationPresent;
        }

        if (!empty($this->cpf)) {
            $filters[self::CPF] = $this->cpf;
        }

        if (!empty($this->cnpj)) {
            $filters[self::CNPJ] = $this->cnpj;
        }

        if (!empty($this->status)) {
            $filters[self::STATUS] = $this->status;
        }

        if (!empty($this->itemsPerPage)) {
            $filters[self::PAGINATION_ITEMS_PER_PAGE] = $this->itemsPerPage;
        }

        if (!empty($this->actualPage)) {
            $filters[self::PAGINATION_ACTUAL_PAGE] = $this->actualPage;
        }

        if (!empty($this->cobvBatchId)) {
            $filters[self::COBV_BATCH_ID] = $this->cobvBatchId;
        }

        return $filters;
    }
}