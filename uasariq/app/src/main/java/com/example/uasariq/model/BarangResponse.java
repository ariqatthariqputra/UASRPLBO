package com.example.uasariq.model;

import com.google.gson.annotations.SerializedName;

import java.util.ArrayList;

public class BarangResponse {

    @SerializedName("result")
    ArrayList<BarangListResponse> result = null;

    public ArrayList<BarangListResponse> getResult() {
        return result;
    }

    public void setResult(ArrayList<BarangListResponse> result) {
        this.result = result;
    }

}
