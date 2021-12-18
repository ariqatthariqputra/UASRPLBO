package com.example.uasariq.database;

import com.example.uasariq.model.UsersModel;
import com.google.gson.annotations.SerializedName;

import java.util.ArrayList;

public class Result {

    @SerializedName("result")
    ArrayList<UsersModel> result;

    public ArrayList<UsersModel> getResult() {
        return result;
    }

    public void setResult(ArrayList<UsersModel> result) {
        this.result = result;
    }
}