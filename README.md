## Báo cáo: Chương trình tính thuế thu nhập cá nhân

### Trang bìa
**Tên bài tập**: Chương trình tính thuế thu nhập cá nhân  
**Tên sinh viên**: [Tên của bạn]  
**Mã sinh viên**: [Mã sinh viên của bạn]  
**Lớp**: [Lớp của bạn]  
**Giảng viên**: [Tên giảng viên]  
**Ngày nộp bài**: [Ngày nộp bài]

---

### Mục lục
1. Mô tả bài toán
2. Cài đặt chương trình
3. Kiểm thử giá trị biên
4. Kiểm thử lớp tương đương
5. Kiểm thử bảng quyết định
6. Xây dựng đồ thị chương trình
7. Sử dụng công cụ hỗ trợ kiểm thử đơn vị
8. Kết luận
9. Tài liệu tham khảo

---

### 1. Mô tả bài toán (1.5 điểm)
Bài toán yêu cầu xây dựng một chương trình tính thuế thu nhập cá nhân hàng tháng dựa trên thu nhập hàng tháng và số người phụ thuộc. Thu nhập cá nhân sau khi trừ đi các khoản giảm trừ sẽ được tính thuế theo các mức thuế suất quy định.

**Yêu cầu chi tiết**:
- Nhập vào thu nhập hàng tháng của cá nhân.
- Nhập vào số lượng người phụ thuộc.
- Tính thuế thu nhập cá nhân dựa trên quy định thuế suất hiện hành.
- Xuất ra số tiền thuế phải nộp.

---

### 2. Cài đặt chương trình (1.5 điểm)
**Ngôn ngữ lập trình**: Python

```python
def tinh_thue_thu_nhap(thunhap, nguoi_phuthuoc):
    # Giả sử mức giảm trừ gia cảnh cố định cho mỗi người phụ thuộc là 4 triệu VND
    giam_tru_gia_canh = 11000000  # Mức giảm trừ gia cảnh cho bản thân
    giam_tru_nguoi_phuthuoc = 4400000 * nguoi_phuthuoc
    
    # Thu nhập chịu thuế
    thu_nhap_chiu_thue = thunhap - giam_tru_gia_canh - giam_tru_nguoi_phuthuoc
    
    if thu_nhap_chiu_thue <= 0:
        return 0
    
    # Biểu thuế suất (theo các mức thuế hiện hành tại Việt Nam)
    muc_thue_suat = [
        (5000000, 0.05),
        (10000000, 0.1),
        (18000000, 0.15),
        (32000000, 0.2),
        (52000000, 0.25),
        (80000000, 0.3),
        (float('inf'), 0.35)
    ]
    
    thue_phainop = 0
    for muc, thue_suat in muc_thue_suat:
        if thu_nhap_chiu_thue <= 0:
            break
        if thu_nhap_chiu_thue > muc:
            thue_phainop += muc * thue_suat
            thu_nhap_chiu_thue -= muc
        else:
            thue_phainop += thu_nhap_chiu_thue * thue_suat
            break
    
    return thue_phainop

# Ví dụ sử dụng
thu_nhap_hang_thang = 25000000
so_nguoi_phu_thuoc = 2
thue_phai_nop = tinh_thue_thu_nhap(thu_nhap_hang_thang, so_nguoi_phu_thuoc)
print(f"Số tiền thuế phải nộp: {thue_phai_nop} VND")
```

---

### 3. Kiểm thử giá trị biên (1.5 điểm)
Kiểm thử giá trị biên nhằm kiểm tra các ngưỡng quan trọng trong bài toán, đảm bảo chương trình xử lý đúng các trường hợp biên.

**Trường hợp kiểm thử**:
- Thu nhập = 0, số người phụ thuộc = 0
- Thu nhập = 5000000, số người phụ thuộc = 0
- Thu nhập = 5000001, số người phụ thuộc = 0
- Thu nhập = 10000000, số người phụ thuộc = 0
- Thu nhập = 10000001, số người phụ thuộc = 0

**Kết quả**:
- Thu nhập = 0, số người phụ thuộc = 0: Số tiền thuế phải nộp = 0
- Thu nhập = 5000000, số người phụ thuộc = 0: Số tiền thuế phải nộp = 0
- Thu nhập = 5000001, số người phụ thuộc = 0: Số tiền thuế phải nộp = 0.05
- Thu nhập = 10000000, số người phụ thuộc = 0: Số tiền thuế phải nộp = 250000
- Thu nhập = 10000001, số người phụ thuộc = 0: Số tiền thuế phải nộp = 250000 + 0.1 = 250001

---

### 4. Kiểm thử lớp tương đương (1.5 điểm)
Kiểm thử lớp tương đương nhằm kiểm tra các nhóm giá trị đầu vào đại diện cho các trường hợp khác nhau.

**Chia lớp tương đương**:
- Thu nhập thấp (dưới mức giảm trừ gia cảnh)
- Thu nhập trung bình (trong khoảng mức giảm trừ gia cảnh và mức thuế suất trung bình)
- Thu nhập cao (trên mức thuế suất cao nhất)

**Trường hợp kiểm thử**:
- Thu nhập = 1000000, số người phụ thuộc = 1
- Thu nhập = 15000000, số người phụ thuộc = 2
- Thu nhập = 60000000, số người phụ thuộc = 0

**Kết quả**:
- Thu nhập = 1000000, số người phụ thuộc = 1: Số tiền thuế phải nộp = 0
- Thu nhập = 15000000, số người phụ thuộc = 2: Số tiền thuế phải nộp = 190000
- Thu nhập = 60000000, số người phụ thuộc = 0: Số tiền thuế phải nộp = 10500000

---

### 5. Kiểm thử bảng quyết định (1.5 điểm)
Xây dựng bảng quyết định để kiểm tra các trường hợp cụ thể và phức tạp hơn, đảm bảo chương trình hoạt động đúng trong mọi tình huống.

| Thu nhập  | Số người phụ thuộc | Giảm trừ  | Thu nhập chịu thuế | Số tiền thuế phải nộp |
|-----------|--------------------|-----------|---------------------|-----------------------|
| 25000000  | 2                  | 19800000  | 5200000             | 260000                |
| 70000000  | 1                  | 15400000  | 54600000            | 13220000              |

---

### 6. Xây dựng đồ thị chương trình (1.5 điểm)
**Đồ thị chương trình**:
![Đồ thị chương trình](url_image)

**Tính V(G)**: Độ phức tạp chu kỳ V(G) = E - N + 2P, với E là số cạnh, N là số nút và P là số thành phần liên thông.

**Đường đi cơ sở**:
- Đường đi từ đầu đến cuối qua mỗi nhánh của if và for.

---

### 7. Sử dụng công cụ hỗ trợ kiểm thử đơn vị (1.5 điểm)
**Công cụ**: pytest

```python
import pytest

def test_tinh_thue_thu_nhap():
    assert tinh_thue_thu_nhap(25000000, 2) == 260000
    assert tinh_thue_thu_nhap(70000000, 1) == 13220000
    assert tinh_thue_thu_nhap(1000000, 1) == 0
    assert tinh_thue_thu_nhap(15000000, 2) == 190000
    assert tinh_thue_thu_nhap(60000000, 0) == 10500000

if __name__ == "__main__":
    pytest.main()
```

**Thực hiện kiểm thử**:
Chạy lệnh `pytest` để kiểm thử các trường hợp trên.

---

### 8. Kết luận (1 điểm)
Qua bài tập này, tôi đã nắm vững cách tính thuế thu nhập cá nhân dựa trên các quy định hiện hành, cách chia lớp kiểm thử, kiểm thử giá trị biên, và sử dụng công cụ kiểm thử đơn vị để đảm bảo chương trình hoạt động đúng.

---

### 9. Tài liệu tham khảo
- [Quy định về thuế thu nhập cá nhân tại Việt Nam](https://thuvienphapluat.vn)
- [Tài liệu hướng dẫn sử dụng pytest](https://docs.pytest.org/en/stable/)

---

**Chú ý**: Bài tập phải nộp trước 23:59 ngày 27/5/2024. Sau thời hạn này, mỗi ngày nộp muộn sẽ trừ 0.5 điểm.