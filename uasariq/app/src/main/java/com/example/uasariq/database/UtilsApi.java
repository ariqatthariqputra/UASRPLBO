package com.example.uasariq.database;

public class UtilsApi {

    // 10.0.2.2 ini adalah localhost.
    public static final String BASE_URL_API = "http://10.0.2.2/ariq_api/";

    // Mendeklarasikan Interface BaseApiService
    public static ApiService getAPIService(){
        return RetrofitClient.getClient(BASE_URL_API).create(ApiService.class);
    }
}
