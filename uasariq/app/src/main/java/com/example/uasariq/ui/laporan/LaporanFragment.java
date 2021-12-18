package com.example.uasariq.ui.laporan;

import android.app.AlertDialog;
import android.content.Context;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import androidx.annotation.NonNull;
import androidx.databinding.DataBindingUtil;
import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;

import com.example.uasariq.R;
import com.example.uasariq.adapter.BarangAdapter;
import com.example.uasariq.database.ApiService;
import com.example.uasariq.database.UtilsApi;
import com.example.uasariq.databinding.FragmentLaporanBinding;
import com.example.uasariq.model.BarangResponse;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class LaporanFragment extends Fragment {

    private FragmentLaporanBinding binding;

    ApiService api;
    Context mContext;
    BarangAdapter recyclerAdapter;

    List<BarangResponse> list;
    private AlertDialog.Builder dialog;


    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {

        binding = DataBindingUtil.inflate(inflater, R.layout.fragment_laporan,container,false);
        binding.getLifecycleOwner();

        mContext = requireContext().getApplicationContext();

        api = UtilsApi.getAPIService();

        LinearLayoutManager layoutManager = new LinearLayoutManager(mContext);
        binding.rvBarang.setLayoutManager(layoutManager);
        binding.rvBarang.setAdapter(recyclerAdapter);
        getdata();

        return binding.getRoot();
    }

    private void getdata() {
       api.getbarang().enqueue(new Callback<BarangResponse>() {
           @Override
           public void onResponse(Call<BarangResponse> call, Response<BarangResponse> response) {
               if (response.isSuccessful()){
                   BarangAdapter adapter = new BarangAdapter(mContext,response.body().getResult());
                   adapter.notifyDataSetChanged();
                   binding.rvBarang.setAdapter(adapter);
               }
           }

           @Override
           public void onFailure(Call<BarangResponse> call, Throwable t) {
                t.printStackTrace();
           }
       });
    }


}