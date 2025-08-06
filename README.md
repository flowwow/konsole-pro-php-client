# Интеграция с сервисом Консоль.Про (https://konsol.pro)

Пример подключения кода

```
$provider=new KonsolProProvider(getenv('KONSOL_PRO_TOKEN'), (float)getenv('KONSOL_PRO_TIMEOUT'));

try {
   $request = new RequestV2ContractorInvites([
       'name'           => $legalName,
       'phone'          => $phone,
       'scenarioId'     => ContractTypeEnum::FLOWWOW_SALES,
       'templateFields' => $templateFields
   ]);
   $provider->createContractorInvite($request);

        return true;
   } catch (Exception $e) {
        ...
        return false;
   }
```